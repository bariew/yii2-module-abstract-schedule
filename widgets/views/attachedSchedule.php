<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $parent yii\db\ActiveRecord */
/* @var $model bariew\scheduleModule\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<table class="table table-bordered table-striped">
    <tr>
        <?php foreach(['model_class', 'model_id', 'model_method', 'model_value', 'start_at_local', 'interval', 'end_at_local'] as $attribute): ?>
            <?php if($this->context->$attribute === null) : ?>
                <td><?=
                    in_array($attribute, ['start_at_local', 'end_at_local'])
                    ? $form->field($model, "[$index]$attribute")->label(false)->widget(
                        \kartik\datetime\DateTimePicker::className(), [
                        'options' => [
                            'placeholder' => $model->getAttributeLabel($attribute),
                            'onmouseenter' => 'if ($(this).parents(".template").length){
                                $(this).datetimepicker($(this).attr("data-krajee-datetimepicker"));
                            }'
                        ]
                    ])
                    : $form->field($model, "[$index]$attribute")->label(false)->textInput(['placeholder' => $model->getAttributeLabel($attribute)]);
                ?></td>
            <?php elseif (is_array($this->context->$attribute)) : ?>
                <td><?= $form->field($model, "[$index]$attribute")->label(false)->dropDownList($this->context->$attribute) ?></td>
            <?php else: ?>
                <td class="hide"><?= $form->field($model, "[$index]$attribute")->hiddenInput(['value' => $this->context->$attribute]) ?></td>
            <?php endif; ?>
        <?php endforeach; ?>
        <td>
            <?= Html::a('<em class="glyphicon glyphicon-trash"></em>',
                ["/schedule/schedule/delete", 'id' => $model->id],
                [
                    'class' => 'btn btn-default',
                    'onclick' =>  '
                        $.post($(this).attr("href"), $(this).parents("form").serialize()),
                        $(this).parents("table").fadeOut().remove();
                        return false;
                    '
                ]) ?>
        </td>
    </tr>
</table>