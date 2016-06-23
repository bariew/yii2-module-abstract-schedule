
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel bariew\scheduleModule\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('modules/schedule', 'Schedule List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?>
        <?= Html::a(
            Yii::t('modules/schedule', 'Create Schedule'),
            ['create'],
            ['class' => 'btn btn-success pull-right']
        ) ?>
    </h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'link:html',
            'owner_id',
            'model_method',
            'model_value',
            'interval',
            \bariew\yii2Tools\helpers\GridHelper::dateFormat($searchModel, 'start_at'),
            \bariew\yii2Tools\helpers\GridHelper::dateFormat($searchModel, 'end_at'),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
