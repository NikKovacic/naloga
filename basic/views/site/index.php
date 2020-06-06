<?php

/* @var $this yii\web\View */
$this->title = \Yii::t('app','TOM Project Manager');

?>

<div class="site-index">
    <div class="row">
        <!--<h1 class="text-center">TOM Project Manager</h1>-->
        <h1 class="text-center"><?= \Yii::t('app','TOM Project Manager')?></h1>
        <h4 class="text-center"><?= \Yii::t('app','Search your project in left menu!')?></h4>
        <br>
        <img src="<?= Yii::$app->request->baseUrl ?>/img/003-setup.png" class="img-responsive center-block">
    </div>
</div>