<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Vagas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-vacancies">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin([
                'id' => 'form-vacancies',
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

            <?= $form->field($vacancy, 'title')->label('Título')  ?>

            <?= $form->field($vacancy, 'description')->textarea()->label('Descrição') ?>

            <?= $form->field($vacancy, 'requeriments')->textarea()->label('Requisitos') ?>

            <?= $form->field($vacancy, 'salary_range')->label('Salário') ?>


            <div class="form-group">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>