<?php
/**
 * ScheduleSearch class file.
 * @copyright (c) 2015, Pavel Bariev
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace bariew\scheduleModule\models;

use bariew\abstractModule\models\AbstractModelExtender;
use yii\data\ActiveDataProvider;

/**
 * Searches schedule schedules.
 * 
 * 
 * @example
 * @author Pavel Bariev <bariew@yandex.ru>
 *
 * @mixin Schedule
 */
class ScheduleSearch extends AbstractModelExtender
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id', 'model_method', 'model_value', 'start_at',
                'owner_id', 'end_at', 'interval'], 'safe']
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = parent::search();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['start_at' => SORT_DESC]
            ]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'owner_id' => $this->owner_id,
            'model_class' => $this->model_class,
            'model_id' => $this->model_class,
            'model_method' => $this->model_class,
            'model_value' => $this->model_class,
            'interval' => $this->interval,
        ]);

        $query->andFilterWhere([
                'like', 'DATE_FORMAT(FROM_UNIXTIME(start_at), "%Y-%m-%d")', $this->start_at
            ])->andFilterWhere([
                'like', 'DATE_FORMAT(FROM_UNIXTIME(end_at), "%Y-%m-%d")', $this->end_at
            ]);

        return $dataProvider;
    }
}
