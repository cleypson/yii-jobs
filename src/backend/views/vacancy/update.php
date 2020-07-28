<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

$this->title = 'Editar vaga';
$this->params['breadcrumbs'][] = 'Vaga / ' .   '#' . $vacancy->id . ' ' . $vacancy->title;
?>
<div class="site-container">
    <h3>
        <?= Html::encode($this->title) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('undo')]),
            ['vacancy/index'],
            ['class' => 'btn btn-danger float-right', 'title' => 'Voltar']
        ) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('trash', ['class' => 'btn-fa'])]),
            ['delete', 'id' => $vacancy->id],
            [
                'class'         => 'btn btn-danger float-right',
                'data'          => [
                    'method'    => 'post',
                    'confirm'   => 'Tem certeza?',
                ]
            ]
        ); ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('eye', ['class' => 'btn-fa'])]),
            ['vacancy/detail', 'id' => $vacancy->id],
            ['class' => 'btn btn-success float-right', 'title' => 'Detalhar']
        ) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('plus')]),
            ['vacancy/create'],
            ['class' => 'btn btn-info float-right', 'title' => 'Nova vaga']
        ) ?>
    </h3>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-10">
            <?= $this->render('_form', [
                'model' => $vacancy,
                'tag_list' => $tag_list,
            ]) ?>
        </div>
    </div>
</div>