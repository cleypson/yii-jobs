<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'Feba Jobs';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($vacancies as $vacancy) : ?>
                <tr>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $vacancy->title ?></h3>
                        </div>
                        <div class="panel-body">
                            <h4>Descrição:</h4>
                            <p><?= $vacancy->description ?></p>
                            <h4>Requisitos:</h4>
                            <p><?= $vacancy->requeriments ?></p>
                            <h4>Remuneração:</h4>
                            <p><?= Yii::$app->formatter->asCurrency($vacancy->salary_range);  ?></p>
                        </div>
                        <div class="panel-footer"><button type="button" class="btn btn-default">Aplicar-se</div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </div>
</div>