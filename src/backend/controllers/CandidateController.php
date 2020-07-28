<?php

namespace backend\controllers;

use Yii;
use common\models\Profile;
use common\models\Tag;
use common\models\User;
use frontend\models\SignupForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Candidate controller
 */
class CandidateController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index'],
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
                    'index' => ['GET', 'POST'],
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
        $dataProvider = new ActiveDataProvider([
            'query' => Profile::find()->orderBy('first_name'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Form add candidate.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $user = new SignupForm();
        $profile = new Profile();
        if ($profile->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($user->validate() && $profile->validate())
            {
                $user = $user->signup();
                $profile->user_id = $user->getId();
                $profile->save();
                Yii::$app->session->setFlash('success', "Candidato #$profile->id $profile->first_name cadastrado com sucesso!.");
                return $this->redirect(['candidate/update', 'id' => $profile->id]);
            }
        }
        $tags = Tag::find()->orderBy('description')->all();
        $tag_list = ArrayHelper::map($tags, 'description', 'description');
        return $this->render('create', [
            'profile' => $profile,
            'user' => $user,
            'tag_list' => $tag_list,
        ]);
    }

    /**
     * Displays edit candidate.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $profile = Profile::findOne((int) Yii::$app->request->get('id'));
        $user = User::findOne($profile->user_id);
        if ($profile->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($user->validate() && $profile->validate()) {
                $user = $user->save();
                $profile->user_id = $user->getId();
                $profile->save();
                Yii::$app->session->setFlash('success', "Candidato #$profile->id $profile->first_name atualizado com sucesso!.");
                return $this->redirect(['candidate/update', 'id' => $profile->id]);
            }
        }
        $tags = Tag::find()->orderBy('description')->all();
        $tag_list = ArrayHelper::map($tags, 'description', 'description');
        $profile->tag_ids = ArrayHelper::map($profile->tags, 'description', 'description');
        return $this->render('update', [
            'profile' => $profile,
            'user' => $user,
            'tag_list' => $tag_list
        ]);
    }

    /**
     * Delete candidate.
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Profile::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Página não encontrada");
        }
        $model->delete();
        Yii::$app->session->setFlash('info', "Candidato #$model->id $model->fullname deletado!");
        return $this->redirect(['candidate/index']);
    }
}
