<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>


    <div class="wrap background-gray">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-light bg-light',
            ],
        ]);
        $menuItems = [
            ['label' => 'HOME', 'url' => ['/site/index']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => 'LOGIN',
                'items' => [
                    ['label' => 'SIGNUP', 'url' => ['/site/signup']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'SOBRE', 'url' => ['/site/about']],
                    ['label' => 'CONTATO', 'url' => ['/site/contact']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'LOGIN', 'url' => ['/site/login']],
                ],
            ];
        } else {
            $menuItems[] = [
                'label' => 'PERFIL',
                'items' => [
                    ['label' => 'ALTERAR DADOS', 'url' => ['/profile/update']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'VAGAS', 'url' => ['/vacancy/create']],
                    ['label' => 'CONTATO', 'url' => ['/site/contact']],
                    ['label' => 'SOBRE', 'url' => ['/site/about']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'SAIR', 'url' => ['/site/logout']],
                ]
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
        <div class="container">
            <?= Breadcrumbs::widget([
                'itemTemplate' => "\n\t<li class=\"breadcrumb-item\"><i>{link}</i></li>\n", // template for all links
                'activeItemTemplate' => "\t<li class=\"breadcrumb-item active\">{link}</li>\n", // template for the active link
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy;<?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>