<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'Feba Jobs';
?>
<div class="site-index">
    <div class="body-content">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">Últimas vagas cadastradas!</h1>
                <?= Html::a('VER NOSSAS VAGAS', ['vacancy/index'], ['class' => 'btn btn-info btn-lg']) ?>
            </div>
        </div>
        <div class="row">
            <?php foreach ($vacancies as $vacancy) : ?>
                <div class="col-sm-4">
                    <div class="card card-vacancy-index">
                        <div class="card-header">
                            <h3 class="card-title text-center"><?= $vacancy->title ?></h3>
                        </div>
                        <div class="card-body">
                            <a href="<?= Url::to(['vacancy/detail', 'id' => $vacancy->id]); ?>" class="vacancy-body-link">
                                <p class="card-text text-center vacancy-description"><?= StringHelper::truncateWords($vacancy->description, 18, $suffix = '...', $asHtml = true) ?></p>
                                <div class="hr-line-dashed"></div>
                                <p class="card-title text-center vacancy-salary_range"><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="hr-line-dashed"></div>
                <?= Html::a('VER TODAS AS VAGAS', ['vacancy/index'], ['class' => 'btn btn-info btn-lg']) ?>
            </div>
        </div>
    </div>
</div>