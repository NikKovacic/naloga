<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\sidenav\SideNav;

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

<div class="wrap">
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        
    ],
]);

?>
<div class="navbar-text pull-right">
<?= \lajax\languagepicker\widgets\LanguagePicker::widget([
'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
]); ?>
</div>
<?php
    NavBar::end();
?>
<div class="container">
    
    <div class="row">
        <div id="sideNav" class="col-sm-3">
        
            <?php 
            
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'heading' =>\Yii::t('app','Menu'),
                    'items' => [
                        [
                            'url'=>'/site/index',
                            'label' => \Yii::t('app','Home'),
                            'icon' => 'glyphicon glyphicon-home'
                            
                        ],
                        [
                            'url'=>'/site/about',
                            'label' => \Yii::t('app','About'),
                            'icon' => 'glyphicon glyphicon-info-sign'
                            
                        ],
                        [
                            'url'=>'/site/naloga?project=1',
                            'label' => 'Projekt',
                            'icon' => 'glyphicon glyphicon-folder-open'
                            
                        ],
                        [
                            'url'=>'/site/naloga?project=2',
                            'label' => 'Projekt 2',
                            'icon' => 'glyphicon glyphicon-folder-open'
                            
                        ],
                        [
                            'url'=>'/site/naloga?project=3',
                            'label' => 'Projekt 3',
                            'icon' => 'glyphicon glyphicon-folder-open'
                            
                        ],
                        
                    ],
                ]);
            ?>  
        </div>
        <div class="col-sm-8">
            <?= $content ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
