<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput

/* @var $this yii\web\View */
/* @var $model application\entities\Blacklist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blacklist-form">

    <div class="alert alert-info">
        <p>
            Черный список рейсов работает по принципу указания ключей, по которым исключается рейс.
        </p>
        <p>
            <b>Примеры:</b>
            <i>
                <ol>
                    <li>Отключение маршрута целиком: необходимо указать <b>маршрут</b> и <b>сервис перевозок</b>.</li>
                    <li>Отключение всех направлений конкретного сервиса: необходимо указать <b>сервис перевозок</b>.</li>
                    <li>Отключение всех направлений на определенную дату: необходимо указать <b>дату отправления</b>.</li>
                    <li>Отключение промежуточной станции конкретного маршрута: необходимо указать <b>город отправления</b>, <b>город прибытия</b>, 
                    <b>маршрут</b>, и <b>сервис перевозок</b>.</li>
                </ol>
            </i>
        </p>
        <p>
            <b>
                Важно, т.к. маршруты имеют различный формат наименования, перед занесением его
                в черный список, следует скопировать точное наименование из поиска Biletavto-Search
            </b>
        </p>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'city_start')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'city_end')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'route_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date')->widget(MaskedInput::className(), [
        'mask' => '99.99.9999',
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'Дата в формате: дд.мм.гггг'
        ]
    ]) ?>

    <?php echo $form->field($model, 'time')->widget(MaskedInput::className(), [
        'mask' => '99:99',
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'Время в формате: чч:мм'
        ]
    ]) ?>

    <?php echo $form->field($model, 'week_day')->dropDownList([
        NULL => 'Не выбрано',
        '1' => 'Понедельник',
        '2' => 'Вторник',
        '3' => 'Среда',
        '4' => 'Четверг',
        '5' => 'Пятница',
        '6' => 'Суббота',
        '0' => 'Воскресенье'
    ]); ?>

    <?php echo $form->field($model, 'id_agent')->dropDownList([
        '0' => 'Biletavto',
        '1' => 'Avtovokzal Online',
        '2' => 'Unitiki'
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
