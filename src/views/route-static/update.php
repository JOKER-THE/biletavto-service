<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\RouteStatic */

$this->title = 'Редактирование: ' . $model->departure . ' - ' . $model->arrival;
$this->params['breadcrumbs'][] = ['label' => 'Список статичных маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->departure . ' - ' . $model->arrival, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="route-static-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
