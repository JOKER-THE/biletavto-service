<?php

/* @var $this yii\web\View */
/* @var $model application\forms\SearchStatisticForm */

$this->title = 'Статистика поиска рейсов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-statistic-index">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
