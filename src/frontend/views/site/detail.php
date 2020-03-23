<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

$this->title = 'Feba Jobs: '.$vacancy->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <tr>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $vacancy->title ?></h3>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Descrição:</h3>
                        <p class="card-text"><?= $vacancy->description ?></p>
                        <h3 class="card-title">Requisitos:</h3>
                        <p class="card-text"><?= $vacancy->requeriments ?></p>
                        <h3 class="card-title">Remuneração:</h3>
                        <p><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary">Aplicar-se</button>
                        <?= Html::a('Voltar', ['site/index'], ['class' => 'btn btn-danger float-right']) ?>
                    </div>
                </div>
            </tr>
        </div>
    </div>
</div>