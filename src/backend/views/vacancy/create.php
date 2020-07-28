<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Cadastrar nova vaga';
$this->params['breadcrumbs'][] = 'Cadastrar nova vaga';
?>
<div class="site-container">
    <h3><?= Html::encode($this->title) ?></h3>
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