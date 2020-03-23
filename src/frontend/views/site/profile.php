<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Atualizar perfil:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-profile']); ?>

            <?= $form->field($profile, 'first_name')->label('Primeiro Nome')  ?>

            <?= $form->field($profile, 'last_name')->label('Último Nome') ?>

            <?= $form->field($profile, 'phonenumber')->label('Telefone de Contato') ?>

            <?= $form->field($profile, 'github_link')->label('Github (opcional)') ?>

            <?= $form->field($profile, 'resume_link')->label('Currículo (opcional)') ?>

            <?= $form->field($profile, 'linkedin_link')->label('Linkedin (opcional)') ?>

            <?= $form->field($profile, 'portfolio_link')->label('Portifólio (opcional)') ?>

            <?= $form->field($profile, 'note')->textarea()->label('Observações (opcional)') ?>

            <div class="form-group">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>