<?php

namespace backend\controllers;

use Yii;
use common\models\Profile;
use common\models\Tag;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update'],
                'rules' => [
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
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
     * Displays edit profile.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $userid = Yii::$app->user->id;
        $model = Profile::find()->where(['user_id' => $userid])->one();
        $tags = Tag::find()->orderBy('description')->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['vacancy/index']);
        }
        return $this->render('update', [
            'profile' => $model,
            'tags'=> $tags 
        ]);
    }
}
