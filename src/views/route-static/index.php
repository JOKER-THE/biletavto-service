<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model yii\data\ActiveDataProvider */

$this->title = 'Список статичных маршрутов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-static-index">

    <div class="alert alert-info">
        <p>
            В этот список входят все те маршруты, что должны отдавать ответ сервера 200 ОК, не зависимо от их наличия. 
        </p>
        <p>
            Это необходимо для того, чтобы боты поисковых сервисов (<b>Yandex</b>, <b>Google</b>) не игнорировали в индексации 
            страницы, у которых временно нет рейсов (кончились по времени, временно отключены из-за сбоя и т.д.).
        </p>
    </div>

    <p>
        <?php echo Html::a('Добавить маршрут в список', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'departure',
                        'arrival',
                        'status',
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
