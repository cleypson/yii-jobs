<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap4\ActiveForm;

$this->title = 'Feba Jobs: ' . $vacancy->title;
$this->params['breadcrumbs'][] = 'Vagas';
$this->params['breadcrumbs'][] = $vacancy->title;
?>
<div class="site-container">
    <div class="body-content">
        <div class="row">
            <tr>
                <div class="card card-vacancy detail">
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
                    <div class="card-header">
                        <h3 class="card-title">
                            <?= $vacancy->title ?>
                            <?= Html::a(
                                Yii::t('app', '{icon}', ['icon' => FA::icon('undo')]),
                                ['vacancy/index'],
                                ['class' => 'btn btn-danger float-right']
                            ) ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Descrição</h3>
                        <p class="card-text"><?= $vacancy->description ?></p>
                        <div class="hr-line-dashed"></div>
                        <h3 class="card-title">Requisitos</h3>
                        <p class="card-text"><?= $vacancy->requeriments ?></p>
                        <div class="hr-line-dashed"></div>
                        <h3 class="card-title">Remuneração</h3>
                        <p><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                        <div class="hr-line-dashed"></div>
                        <div class="card-text">
                            <?php foreach ($vacancy->tags as $tag) : ?>
                                <span class="badge badge-pill badge-secondary badge-tag"><?= $tag->description ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton('Quero me Candidatar', ['class' => 'btn btn-info btn-lg', 'name' => 'submit-button', 'value' => 'apply']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </tr>
        </div>
    </div>
</div>