<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model application\entities\RouteStatic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-static-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'departure')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'arrival')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList([
        '200' => '200 OK',
        '404' => '404 Page Not Found'
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
