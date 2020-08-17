<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model yii\data\ActiveDataProvider */

$this->title = 'Черный список рейсов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-index">

    <p>
        <?php echo Html::a('Добавить исключение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?php echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $model,
                    'tableOptions' => [
                        'class' => 'table table-striped',
                    ],
                    'options' => [
                        'class' => 'table-responsive',
                    ],
                    'columns' => [
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
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'white-space: nowrap;']
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
