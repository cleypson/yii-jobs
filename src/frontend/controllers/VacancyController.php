<?php

namespace frontend\controllers;

use common\models\Vacancy;
use frontend\models\VacancyForm;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
                'only' => ['create', 'detail', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'detail', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['GET', 'POST'],
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
        $query = Vacancy::find(['status' => 10]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $vacancies = $query->orderBy(['id' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'vacancies' => $vacancies,
            'pagination' => $pagination,
        ]);
    }
    /**
     * Displays vacancy details.
     *
     * @return mixed
     */
    public function actionDetail()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $vacancy = Vacancy::findOne(['id' => $id]);
        return $this->render('detail', [
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Form add vacancy.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $vacancy = new Vacancy();
        if ($vacancy->load(Yii::$app->request->post()) && $vacancy->save()) {
            Yii::$app->session->setFlash('success', 'Nova vaga cadastrada com sucesso.');
            return Yii::$app->response->redirect(['vacancy/index']);
        }
        return $this->render('create', [
            'vacancy' => $vacancy,
        ]);
    }
}