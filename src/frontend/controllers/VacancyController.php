<?php

namespace frontend\controllers;

use common\models\Profile;
use common\models\ProfileVacancy;
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
        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->post('submit-button') == 'apply') {
                $user_id = Yii::$app->user->id;
                $profile = Profile::find()->where(['user_id' => $user_id])->one();
                $apply = new ProfileVacancy();
                $apply->profile_id = $profile->id;
                $apply->vacancy_id = $vacancy->id;
                $apply->save();
                Yii::$app->session->setFlash('success', "Candidatura a vaga #$vacancy->id $vacancy->title realizada com sucesso.");
            } else if (Yii::$app->request->post('submit-button') == 'delete') {
                $vacancy->delete();
                Yii::$app->session->setFlash('info', "Vaga #$vacancy->id $vacancy->title deletada!.");
                return $this->redirect(['vacancy/index']);
            }
        }

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
    /**
     * Displays edit profile.
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Vacancy::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['vacancy/detail', 'id' => $model->id]);
        }
        return $this->render('update', [
            'vacancy' => $model,
        ]);
    }
}
