<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'first_name')->label('Primeiro Nome')  ?>

            <?= $form->field($model, 'last_name')->label('Último Nome') ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'phonenumber')->label('Telefone de Contato') ?>

            <?= $form->field($model, 'github_link')->label('Github (opcional)') ?>

            <?= $form->field($model, 'resume_link')->label('Currículo (opcional)') ?>

            <?= $form->field($model, 'linkedin_link')->label('Linkedin (opcional)') ?>

            <?= $form->field($model, 'portfolio_link')->label('Portifólio (opcional)') ?>
            
            <?= $form->field($model, 'note')->textarea()->label('Observações (opcional)') ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>