<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = \Yii::t('app','About');

?>
<div class="site-about">
    <div class="row">

        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        <br>
        <p class="text-center">
        <?php echo \Yii::t('app','TOM Project Manager is a tool that allows managers to effectively monitor projects.');?> 
        <?php echo \Yii::t('app','With his usage, it is possible to check the current level of project completion ');?>
        <?php echo \Yii::t('app','and view the individual tasks that the project contains.');?>
        </p>
    </div>
</div>
