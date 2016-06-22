<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model bariew\scheduleModule\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'owner_id')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'model_class')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'model_id')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'model_method')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'model_value')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'interval')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'start_at')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_RANGE,
        'attribute2' => 'end_at'
    ]) ?>
    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('modules/schedule', 'Create') : Yii::t('modules/schedule', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
