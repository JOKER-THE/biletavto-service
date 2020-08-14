<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\entities\Blacklist */

$this->title = 'Добавить исключение в черный список';
$this->params['breadcrumbs'][] = ['label' => 'Черный список рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
