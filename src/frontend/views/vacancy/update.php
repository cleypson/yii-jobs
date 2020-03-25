<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Editar vaga';
$this->params['breadcrumbs'][] = 'Vaga / ' . $vacancy->title;;
?>
<div class="site-container">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-10">
            <?php $form = ActiveForm::begin([
                'id' => 'form-vacancies',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-3',
                        'offset' => 'offset-sm-10',
                        'wrapper' => 'col-sm-10',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>

            <?= $form->field($vacancy, 'title')->label('Título')  ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($vacancy, 'description')->textarea(['rows' => 5])->label('Descrição') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($vacancy, 'requeriments')->textarea(['rows' => 10])->label('Requisitos') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($vacancy, 'salary_range')->label('Salário') ?>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>