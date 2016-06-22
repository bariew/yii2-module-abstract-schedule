<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bariew\scheduleModule\models\Item */

$this->title = Yii::t('modules/schedule', 'Schedule for {model}', ['model' => $model->getLink()]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/schedule', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('modules/schedule', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('modules/schedule', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('modules/schedule', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'owner_id',
            'link',
            'model_method',
            'model_value',
            'interval',
            'start_at:datetime',
            'end_at:datetime',
        ],
    ]) ?>

</div>
