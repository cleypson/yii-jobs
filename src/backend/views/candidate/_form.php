 <?php

    use kartik\widgets\Select2;
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
    use yii\widgets\MaskedInput;

    ?>

 <?php $form = ActiveForm::begin([
        'id' => 'form-model',
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

 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

 <?= $form->field($model, 'email') ?>

 <?= $form->field($model, 'password')->passwordInput() ?>
 
 <?= $form->field($model, 'first_name')->label('Primeiro Nome')  ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'last_name')->label('Último Nome') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'phonenumber')->label('Telefone de Contato')->widget(MaskedInput::className(), ['mask' => '(99) 99999-9999']) ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'github_link')->label('Github (opcional)') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'resume_link')->label('Currículo (opcional)') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'linkedin_link')->label('Linkedin (opcional)') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'portfolio_link')->label('Portifólio (opcional)') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'note')->textarea()->label('Observações (opcional)') ?>
 <div class="hr-line-dashed"></div>
 <?= $form->field($model, 'tag_ids')->widget(Select2::classname(), [
        'data' => $tag_list,
        'attribute' => 'tag_ids',
        'options' => ['placeholder' => 'Minhas habilidades', 'multiple' => true],
        'size' => Select2::LARGE,
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 20
        ],
    ])->label('Habilidades'); ?>
 <div class="hr-line-dashed"></div>
 <div class="form-group">
     <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
 </div>
 <?php ActiveForm::end(); ?>