<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model application\entities\Blacklist */

$this->title = 'Исключение';
$this->params['breadcrumbs'][] = ['label' => 'Черный список рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-view">

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
                'route_name',
                'date',
                'time',
                [
                    'attribute' => 'week_day',
                    'value' => function($model) {
                        switch ($model->week_day){
                            case NULL: {
                                $value = NULL;
                                break;
                            }
                            case 0: {
                                $value = "Воскресенье";
                                break;
                            }
                            case 1: {
                                $value = "Понедельник";
                                break;
                            }
                            case 2: {
                                $value = "Вторник";
                                break;
                            }
                            case 3: {
                                $value = "Среда";
                                break;
                            }
                            case 4: {
                                $value = "Четверг";
                                break;
                            }
                            case 5: {
                                $value = "Пятница";
                                break;
                            }
                            case 6: {
                                $value = "Суббота";
                                break;
                            }
                        }
                        return $value;
                    }
                ],
                [
                    'attribute' => 'agent',
                    'filter' => [0 => "Biletavto", 1 => "Avtovokzal Online", 2 => "Unitiki"],
                    'value' => function($model) {
                        switch ($model->id_agent){
                            case 0: {
                                $value = "Biletavto";
                                break;
                            }
                            case 1: {
                                $value = "Avtovokzal Online";
                                break;
                            }
                            case 2: {
                                $value = "Unitiki";
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
