<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model application\entities\Notification */

$this->title = $model->city_start . ' - ' . $model->city_end;
$this->params['breadcrumbs'][] = ['label' => 'Уведомления для рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-view">

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
                'city_start',
                'city_end',
                'notification:ntext',
                [
                    'attribute' => 'active', 
                    'filter' => [1 => "Включено", 0 => "Отключено"],
                    'value' => function($model) {
                        switch ($model->active){
                            case 0: {
                                $value = "Отключено";
                                break;
                            }
                            case 1: {
                                $value = "Включено";
                                break;
                            }
                        }
                        return $value;
                    }
                ]
            ]
        ]) ?>
    </div>
</div>
