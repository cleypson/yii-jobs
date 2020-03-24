<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;

$this->title = 'Feba Jobs';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($vacancies as $vacancy) : ?>
                <tr>
                    <div class="card card-vacancy">
                        <div class="card-header">
                            <h3 class="card-title"><?= $vacancy->title ?></h3>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Descrição:</h3>
                            <p class="card-text"><?= $vacancy->description ?></p>
                            <h3 class="card-title">Remuneração:</h3>
                            <p><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                        </div>
                        <div class="card-footer">
                            <?= Html::a('Aplicar-se', ['vacancy/detail', 'id' => $vacancy->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Detalhar', ['vacancy/detail', 'id' => $vacancy->id], ['class' => 'btn btn-danger float-right']) ?>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>
    </div>
</div>