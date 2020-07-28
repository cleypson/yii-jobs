<?php

/* @var $this yii\web\View */

use kartik\form\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Feba Jobs';
$this->params['breadcrumbs'][] = 'Vagas';

?>
<div class="site-container">
    <h3>
        Lista de Vagas

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('undo')]),
            ['site/index'],
            ['class' => 'btn btn-danger float-right', 'title' => 'Voltar']
        ) ?>

        <?= Html::a(
            Yii::t('app', '{icon}', ['icon' => FA::icon('plus')]),
            ['vacancy/create'],
            ['class' => 'btn btn-info float-right', 'title' => 'Nova vaga']
        ) ?>
    </h3>
    <div class="hr-line-dashed"></div>
    <div class="body-content">
        <div class="row">
            <?php $form = ActiveForm::begin([
                'id' => 'form-vacancy',
            ]); ?>
            <div class="col-12">
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
                            'label' => 'Titulo',
                            'attribute' => 'title',
                            'value' => 'title',
                            'headerOptions' => [
                                'class' => 'text-center',
                            ],
                            'contentOptions' => [
                                'class' => 'text-center',
                            ],
                        ],
                        [
                            'label' => 'Descrição',
                            'attribute' => 'description',
                            'value' => 'description',
                            'headerOptions' => [
                                'class' => 'text-center',
                            ],
                            'contentOptions' => [
                                'class' => 'text-justify',
                            ],
                        ],
                        [
                            'label' => 'Criada em',
                            'attribute' => 'created_at',
                            'headerOptions' => [
                                'class' => 'text-center',
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
                                        ["vacancy/update", 'id' => $data->id],
                                        ['class' => 'btn btn-info', 'title' => 'Editar']
                                    )
                                    . Html::a(
                                        Yii::t(
                                            'app',
                                            '{icon}',
                                            ['icon' => FA::icon('eye', ['class' => 'btn-fa'])]
                                        ),
                                        ["vacancy/detail", 'id' => $data->id],
                                        ['class' => 'btn btn-success', 'title' => 'Detalhes']
                                    ) . Html::a(
                                        Yii::t('app', '{icon}', ['icon' => FA::icon('trash', ['class' => 'btn-fa'])]),
                                        ['delete', 'id' => $data->id],
                                        [
                                            'class'         => 'btn btn-danger',
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
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>