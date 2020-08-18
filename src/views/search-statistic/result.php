<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model application\forms\SearchStatisticForm */

$this->title = 'Статистика поиска рейсов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-statistic-result">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

    <div class="col-md-6">
        <div class="alert alert-success">
           <p>Рейсы, поиск которых прошел <b>успешно</b></p>
        </div>
        <?php echo GridView::widget([
            'dataProvider' => $success,
            'tableOptions' => [
                'class' => 'table table-striped',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'columns' => [
                [
                    'label' => 'Рейс',
                    'value' => function($success) {
                        return $success->departure . ' - ' . $success->arrival;
                    }
                ],
                [
                    'label' => 'Просмотры',
                    'value' => function($success) {
                        return $success->count;
                    }
                ]
            ]
        ]); ?>
    </div>

    <div class="col-md-6">
        <div class="alert alert-danger">
           <p>Рейсы, поиск которых прошел <b>неудачно</b></p>
        </div>
        <?php echo GridView::widget([
            'dataProvider' => $fail,
            'tableOptions' => [
                'class' => 'table table-striped',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'columns' => [
                [
                    'label' => 'Рейс',
                    'value' => function($fail) {
                        return $fail->departure . ' - ' . $fail->arrival;
                    }
                ],
                [
                    'label' => 'Просмотры',
                    'value' => function($fail) {
                        return $fail->count;
                    }
                ]
            ]
        ]); ?>
    </div>

</div>
