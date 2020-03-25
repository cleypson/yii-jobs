<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;

$this->title = 'Feba Jobs';
$this->params['breadcrumbs'][] = 'Vagas';

?>
<div class="site-container">
    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <?php foreach ($vacancies as $vacancy) : ?>
                    <div class="card card-vacancy">
                        <div class="card-header">
                            <h3 class="card-title"><?= $vacancy->title ?></h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text "><?= $vacancy->description ?></p>
                            <div class="hr-line-dashed"></div>
                            <p><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                        </div>
                        <div class="card-footer">
                            <?= Html::a('Ver mais detalhes', ['vacancy/detail', 'id' => $vacancy->id], ['class' => 'btn btn-info btn-lg']) ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="hr-line-dashed"></div>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>
    </div>
</div>