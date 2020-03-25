<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\Profile */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Editar meu perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?php $form = ActiveForm::begin([
                'id' => 'form-profile',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-3',
                        'offset' => 'offset-sm-8',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>

            <?= $form->field($profile, 'first_name')->label('Primeiro Nome')  ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'last_name')->label('Último Nome') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'phonenumber')->label('Telefone de Contato') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'github_link')->label('Github (opcional)') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'resume_link')->label('Currículo (opcional)') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'linkedin_link')->label('Linkedin (opcional)') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'portfolio_link')->label('Portifólio (opcional)') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($profile, 'note')->textarea()->label('Observações (opcional)') ?>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>