<?php

namespace application\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use application\entities\RouteStatic;
use application\forms\search\RouteStaticForm;

/**
 * Контроллер, отвечающий за работу
 * со статичными маршрутами, которые в
 * любом случае должны отдавать 200 ОК.
 */
class RouteStaticController extends Controller
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
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    /**
     * Получить список статичных маршрутов.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new RouteStaticForm();
        $dataProvider = $model->search(Yii::$app->request->get());

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Отображение конкретного статичного маршрута.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException если модель не была найдена
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Создание нового статичного маршрута.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RouteStatic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Обновление статичного маршрута.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException если модель не была найдена
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Удаление статичного маршрута.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException если модель не была найдена
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Поиск статичного маршрута по его идентификатору.
     *
     * @param integer $id
     *
     * @return RouteStatic $model
     * @throws NotFoundHttpException если модель не была найдена
     */
    protected function findModel($id)
    {
        if (($model = RouteStatic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
