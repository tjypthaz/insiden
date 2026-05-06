<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\K3rslap */

$this->title = 'Buat Pelaporan K3RS';
?>
<div class="k3rslap-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
