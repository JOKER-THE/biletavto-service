<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model application\forms\SearchStatisticForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class="col-md-12">
    <div class="search-form">
        <?php $form = ActiveForm::begin([
            'id' => 'search-form',
            'fieldConfig' => [
                'template' => "{label}\n<div>{input}</div>\n<div></div>"
            ],
        ]); ?>

            <div class="col-md-4">
                <?php echo $form->field($model, 'dateIntervalStart')->widget(MaskedInput::className(), [
                    'mask' => '99.99.9999',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Дата в формате: дд.мм.гггг'
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'dateIntervalEnd')->widget(MaskedInput::className(), [
                    'mask' => '99.99.9999',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Дата в формате: дд.мм.гггг'
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Получить данные за этот период?</label>
                    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary btn-block', 'name' => 'search-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
