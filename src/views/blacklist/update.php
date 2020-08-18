<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\Blacklist */

$this->title = 'Редактирование исключения черного списка';
$this->params['breadcrumbs'][] = ['label' => 'Черный список рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Исключение', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="blacklist-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
