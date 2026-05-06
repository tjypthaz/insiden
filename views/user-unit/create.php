<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserUnit */

$this->title = 'Create User Unit';
$this->params['breadcrumbs'][] = ['label' => 'User Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
