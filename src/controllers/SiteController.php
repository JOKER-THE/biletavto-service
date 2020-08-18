<?php

namespace application\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Базовый контроллер приложения.
 */
class SiteController extends Controller
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
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];
    }

    /**
     * Отображение главной страницы приложения.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
