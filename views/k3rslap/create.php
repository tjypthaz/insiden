<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\K3rslap */

$this->title = 'Create Pelaporan Baru';
$this->params['breadcrumbs'][] = ['label' => 'K3rslaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="k3rslap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
