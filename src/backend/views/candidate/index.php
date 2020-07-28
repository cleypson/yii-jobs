<?php

/* @var $this yii\web\View */

use kartik\form\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Feba Jobs';
$this->params['breadcrumbs'][] = 'Candidatos';

?>
<div class="site-container">
    <h3>
        Lista de Candidatos

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('undo')]),
            ['site/index'],
            ['class' => 'btn btn-danger float-right', 'title' => 'Voltar']
        ) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('plus')]),
            ['candidate/create'],
            ['class' => 'btn btn-info float-right', 'title' => 'Nova vaga']
        ) ?>
    </h3>
    <div class="hr-line-dashed"></div>
    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <?php $form = ActiveForm::begin([
                    'id' => 'form-candidate',
                ]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => 'yii\bootstrap4\LinkPager',
                    ],
                    'columns' => [
                        [
                            'attribute' => 'id',
                            'headerOptions' => [
                                'style' => 'width: 5%'
                            ],
                        ],
                        [
                            'label' => 'Nome',
                            'attribute' => 'first_name',
                            'value' => 'fullname',
                            'headerOptions' => [
                                'class' => 'text-left',
                                'style' => 'width: 55%'

                            ],
                            'contentOptions' => [
                                'class' => 'text-left',
                            ],
                        ],
                        [
                            'label' => 'Criado em',
                            'attribute' => 'created_at',
                            'headerOptions' => [
                                'class' => 'text-center',
                                'style' => 'width: 20%'

                            ],
                            'contentOptions' => [
                                'class' => 'text-center',
                            ],
                            'value' => function ($data) {
                                return Yii::$app->formatter->asDate($data->created_at, 'php:d/m/Y á\s h:s');
                            }
                        ],
                        [
                            'label' => 'Ações',
                            'format' => 'raw',
                            'headerOptions' => [
                                'class' => 'text-center',
                                'style' => 'width: 20%'

                            ],
                            'contentOptions' => [
                                'class' => 'text-center',
                            ],
                            'value' => function ($data) {
                                return
                                    Html::a(
                                        Yii::t(
                                            'app',
                                            '{icon}',
                                            ['icon' => FA::icon('edit', ['class' => 'btn-fa'])]
                                        ),
                                        ["candidate/update", 'id' => $data->id],
                                        ['class' => 'btn btn-info', 'title' => 'Editar']
                                    ) . Html::a(
                                        Yii::t('app', '{icon}', ['icon' => FA::icon('trash', ['class' => 'btn-fa'])]),
                                        ['delete', 'id' => $data->id],
                                        [
                                            'class'         => 'btn btn-danger float-right',
                                            'data'          => [
                                                'method'    => 'post',
                                                'confirm'   => 'Tem certeza?',
                                            ]
                                        ]
                                    );
                            },
                        ]

                    ],
                ]) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>