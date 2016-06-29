<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bariew\scheduleAbstractModule\models\Schedule */

$this->title = Yii::t('modules/schedule', 'Schedule for {model}', ['model' => $model->getLink()]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/schedule', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('modules/schedule', 'View');
?>
<div class="schedule-view">

    <h1>
        <?= $this->title ?>
        <p class="pull-right">
            <?= Html::a(Yii::t('modules/schedule', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('modules/schedule', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('modules/schedule', 'Are you sure you want to delete this schedule?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'owner_id',
            'link:html',
            'model_method',
            'model_value',
            'interval',
            'start_at:datetime',
            'end_at:datetime',
        ],
    ]) ?>

</div>
