<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\RouteStatic */

$this->title = 'Добавить статичный маршрут';
$this->params['breadcrumbs'][] = ['label' => 'Список статичных маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-static-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
