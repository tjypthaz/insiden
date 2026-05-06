<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\K3rsjenis */

$this->title = 'Create Jenis Insiden';
$this->params['breadcrumbs'][] = ['label' => 'K3rsjenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="k3rsjenis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
