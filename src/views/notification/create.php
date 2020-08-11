<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\Notification */

$this->title = 'Добавить уведомление';
$this->params['breadcrumbs'][] = ['label' => 'Уведомления для рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
