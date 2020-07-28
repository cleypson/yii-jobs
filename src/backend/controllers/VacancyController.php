<?php

namespace backend\controllers;

use Yii;
use common\models\Tag;
use common\models\Vacancy;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Vacancy controller
 */
class VacancyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' =>  ['create', 'detail', 'update', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'detail','update', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'POST'],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->post('delete-button')) {
                $vacancy = Vacancy::findOne((int) Yii::$app->request->post('delete-button'));
                $vacancy->delete();
                Yii::$app->session->setFlash('info', "Vaga #$vacancy->id $vacancy->title deletada!.");
                return $this->redirect(['vacancy/index']);
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Vacancy::find(['status' => 10]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays vacancy details.
     *
     * @return mixed
     */
    public function actionDetail($id)
    {
        $model = Vacancy::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Página não encontrada");
        }
        return $this->render('detail', [
            'vacancy' => $model,
        ]);
    }

    /**
     * Form add vacancy.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vacancy();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Vaga #' . $model->id . ' ' . $model->title . ' cadastrada com sucesso.');
            return $this->redirect(['vacancy/detail', 'id' => $model->id]);
        }
        $tags = Tag::find()->orderBy('description')->all();
        $tag_list = ArrayHelper::map($tags, 'description', 'description');
        return $this->render('create', [
            'vacancy' => $model,
            'tag_list' => $tag_list,
        ]);
    }

    /**
     * Displays edit vacancy.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = Vacancy::findOne((int) Yii::$app->request->get('id'));
        if (!$model) {
            throw new NotFoundHttpException("Página não encontrada");
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Vaga #'.$model->id.' '.$model->title. ' atualizada com sucesso.');
            return $this->redirect(['vacancy/detail', 'id' => $model->id]);
        }
        $tags = Tag::find()->orderBy('description')->all();
        $tag_list = ArrayHelper::map($tags, 'description', 'description');
        $model->tag_ids = ArrayHelper::map($model->tags, 'description', 'description');
        return $this->render('update', [
            'vacancy' => $model,
            'tag_list'=> $tag_list
        ]);
    }

    /**
     * Delete vacancy.
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Vacancy::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Página não encontrada");
        }
        $model->delete();
        Yii::$app->session->setFlash('info', "Vaga #$model->id $model->title deletada!");
        return $this->redirect(['vacancy/index']);
    }
}
