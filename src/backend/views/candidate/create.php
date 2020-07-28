<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\Profile */

use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

$this->title = 'Cadastrar novo candidato';
$this->params['breadcrumbs'][] = 'Candidatos / ' . $this->title;
?>
<div class="site-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= $this->render('_form', [
                'model' => $profile,
                'user' => $user,
                'tag_list' => $tag_list,
            ]) ?>
        </div>
    </div>
</div>