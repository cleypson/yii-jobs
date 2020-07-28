<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

$this->title = 'Editar candidato';
$this->params['breadcrumbs'][] = 'Candidatos / ' .  '#' . $profile->id . ' ' . $profile->first_name;
?>
<div class="site-container">
    <h3>
        <?= Html::encode($this->title) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('undo')]),
            ['candidate/index'],
            ['class' => 'btn btn-danger float-right', 'title' => 'Voltar']
        ) ?>

        <?= Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('trash', ['class' => 'btn-fa'])]), ['delete', 'id' => $profile->id], [
            'class'         => 'btn btn-danger float-right',
            'data'          => [
                'method'    => 'post',
                'confirm'   => 'Tem certeza?',
            ]
        ]); ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('plus')]),
            ['candidate/create'],
            ['class' => 'btn btn-info float-right', 'title' => 'Novo candidato']
        ) ?>
    </h3>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-10">
            <?= $this->render('_form', [
                'model' => $profile,
                'user' => $user,
                'tag_list' => $tag_list,
            ]) ?>
        </div>
    </div>
</div>