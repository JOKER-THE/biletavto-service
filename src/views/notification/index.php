<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model yii\data\ActiveDataProvider */

$this->title = 'Уведомления для рейсов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-index">

    <p>
        <?php echo Html::a('Добавить уведомление', ['create'], ['class' => 'btn btn-success']) ?>
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
