<?php

namespace application\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use application\entities\Notification;

/**
 * Контроллер, отвечающий за работу
 * с уведомлениями для рейсов.
 */
class NotificationController extends Controller
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
     * Получить список уведомлений.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ActiveDataProvider([
            'query' => Notification::find()
                ->orderBy(['active' => SORT_DESC])
        ]);

        return $this->render('index', [
            'model' => $model
        ]);
    }

    /**
     * Отображение конкретного уведомления.
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
     * Создание нового уведомления.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notification();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Обновление уведомления.
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
     * Удаление уведомления.
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
     * Поиск уведомления по его идентификатору.
     *
     * @param integer $id
     *
     * @return Notification $model
     * @throws NotFoundHttpException если модель не была найдена
     */
    protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
