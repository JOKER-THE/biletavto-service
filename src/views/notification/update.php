<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\Notification */

$this->title = 'Редактирование: ' . $model->city_start . ' - ' . $model->city_end;
$this->params['breadcrumbs'][] = ['label' => 'Уведомления для рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city_start . ' - ' . $model->city_end, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="notification-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
