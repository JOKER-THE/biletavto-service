<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model application\entities\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'city_start')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'city_end')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'notification')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'active')->dropDownList([
        '1' => 'Включено',
        '0' => 'Отключено'
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
