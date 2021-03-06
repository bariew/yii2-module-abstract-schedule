<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bariew\scheduleAbstractModule\models\Schedule */

$this->title = Yii::t('modules/schedule', 'Update Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/schedule', 'Schedule List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('modules/schedule', 'Update');
?>
<div class="schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
