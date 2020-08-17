<?php

namespace application\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use application\entities\SearchStatistic;
use application\forms\SearchStatisticForm;

/**
 * Контроллер, отвечающий за работу
 * со статистикой поиска рейсов.
 */
class SearchStatisticController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    /**
     * Получить статистику поиска рейсов.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new SearchStatisticForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $statistic = new SearchStatistic();
            $success = $statistic->searchInterval($model->dateIntervalStart, $model->dateIntervalEnd, $statistic::STATUS_SUCCESS);
            $fail = $statistic->searchInterval($model->dateIntervalStart, $model->dateIntervalEnd, $statistic::STATUS_FAIL);

            return $this->render('result', [
                'model' => $model,
                'success' => $success,
                'fail' => $fail
            ]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}
