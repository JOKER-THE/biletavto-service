<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model application\entities\Route-Static */

$this->title = $model->departure . ' - ' . $model->arrival;
$this->params['breadcrumbs'][] = ['label' => 'Список статичных маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-static-view">

    <p>
        <?php echo Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div>
        <?php echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'departure',
                'arrival',
                'status'
            ]
        ]) ?>
    </div>
</div>
