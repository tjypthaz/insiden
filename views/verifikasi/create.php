<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Verifikasi */

$this->title = 'Create Verifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Verifikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
