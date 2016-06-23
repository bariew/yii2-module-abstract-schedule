<?php
/**
 * Schedule class file.
 * @copyright (c) 2015, Pavel Bariev
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace bariew\scheduleModule\models;

use bariew\abstractModule\models\AbstractModel;
use bariew\yii2Tools\helpers\ModelHelper;
use Yii;

/**
 * Description.
 *
 * Usage:
 * @author Pavel Bariev <bariew@yandex.ru>
 * @property int $id
 * @property INTEGER $owner_id
 * @property INTEGER $start_at
 * @property INTEGER $end_at
 * @property INTEGER $start_at_local
 * @property INTEGER $end_at_local
 * @property STRING $model_class
 * @property INTEGER $model_id
 * @property STRING $model_method
 * @property STRING $model_value
 * @property integer interval
 * @property string link
 *
 */
class Schedule extends AbstractModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_method', 'start_at_local'], 'required'],
            [['model_id', 'interval'], 'integer'],
            [['model_class', 'model_method', 'start_at_local', 'end_at_local'], 'string', 'max' => 255],
            [['model_value'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modules/schedule', 'ID'),
            'owner_id' => Yii::t('modules/schedule', 'Owner ID'),
            'link' => Yii::t('modules/schedule', 'Model link'),
            'model_class' => Yii::t('modules/schedule', 'Model class'),
            'model_id' => Yii::t('modules/schedule', 'Model ID'),
            'model_method' => Yii::t('modules/schedule', 'Model method'),
            'model_value' => Yii::t('modules/schedule', 'Method value'),
            'interval' => Yii::t('modules/schedule', 'Interval (minutes)'),
            'start_at_local' => Yii::t('modules/schedule', 'Start At'),
            'end_at_local' => Yii::t('modules/schedule', 'End At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'datetime' => [
                'class' => \bariew\yii2Tools\behaviors\DatetimeBehavior::className(),
                'attributes' => ['start_at', 'end_at'],
            ]
        ];
    }

    /**
     * Link to the parent model
     * @return string
     */
    public function getLink()
    {
        return ModelHelper::getLink($this->model_class, $this->model_id);
    }

    /**
     * This should be triggered by cron
     */
    public static function eventHandler()
    {
        $time = strtotime(date('Y-m-d H:i:0', time()));
        static::deleteAll(['OR', ['<', 'end_at', $time], ['<', 'start_at', $time]]);
        $schedules = static::findAll(['start_at' => $time]);
        foreach ($schedules as $schedule) {
            if ($schedule->end_at <= $time || !$schedule->interval) {
                continue; // this will be deleted at next cron
            }
            $schedule->updateCounters(['start_at' => $schedule->interval*60]);
        }
        foreach ($schedules as $schedule) {
            /** @var \yii\db\ActiveRecord $class,$model */
            $class = $schedule->model_class;
            $model = $schedule->model_id ? $class::findOne($schedule->model_id) : new $class;
            call_user_func([$model, $schedule->model_method], $schedule->model_value);
        }
        return count($schedules);
    }
}
