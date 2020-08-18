<?php

namespace application\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use application\entities\Blacklist;
use application\forms\search\BlacklistForm;

/**
 * Контроллер, отвечающий за работу
 * с черным списком рейсов.
 */
class BlacklistController extends Controller
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
     * Получить список исключений.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new BlacklistForm();
        $dataProvider = $model->search(Yii::$app->request->get());

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Отображение конкретного исключения.
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
     * Создание нового исключения.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blacklist();

        if ($model->load(Yii::$app->request->post())) {
            $model->agent = $model->getAgent($model->id_agent);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Обновление исключения.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException если модель не была найдена
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->agent = $model->getAgent($model->id_agent);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Удаление исключения.
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
     * Поиск исключения по его идентификатору.
     *
     * @param integer $id
     *
     * @return Blacklist $model
     * @throws NotFoundHttpException если модель не была найдена
     */
    protected function findModel($id)
    {
        if (($model = Blacklist::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
