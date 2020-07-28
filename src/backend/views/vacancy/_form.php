<?php

use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
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
<?= $form->field($model, 'title')->label('Título')  ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'description')->textarea()->label('Descrição') ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'requeriments')->textarea()->label('Requisitos') ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'salary_range')->label('Salário') ?>
<div class="hr-line-dashed"></div>
<?= $form->field($model, 'tag_ids')->widget(Select2::classname(), [
    'data' => $tag_list,
    'attribute' => 'tag_ids',
    'options' => ['placeholder' => 'Habilidades', 'multiple' => true],
    'size' => Select2::LARGE,
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 20
    ],
])->label('Habilidades'); ?>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>