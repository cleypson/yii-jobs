<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-container">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'offset' => 'offset-sm-8',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>

            <?= $form->field($profile, 'first_name')->label('Primeiro Nome')  ?>

            <?= $form->field($profile, 'last_name')->label('Último Nome') ?>

            <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($user, 'email') ?>

            <?= $form->field($user, 'password')->passwordInput() ?>

            <?= $form->field($profile, 'phonenumber')->label('Telefone de Contato') ?>

            <?= $form->field($profile, 'github_link')->label('Github (opcional)') ?>

            <?= $form->field($profile, 'resume_link')->label('Currículo (opcional)') ?>

            <?= $form->field($profile, 'linkedin_link')->label('Linkedin (opcional)') ?>

            <?= $form->field($profile, 'portfolio_link')->label('Portifólio (opcional)') ?>

            <?= $form->field($profile, 'note')->textarea()->label('Observações (opcional)') ?>

            <div class="form-group">
                <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>