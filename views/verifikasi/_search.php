<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Verifikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifikasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_verifikator') ?>

    <?= $form->field($model, 'id_band') ?>

    <?= $form->field($model, 'id_jenis') ?>

    <?= $form->field($model, 'aktivasi') ?>

    <?php // echo $form->field($model, 'investigasi') ?>

    <?php // echo $form->field($model, 'tindak_lanjut') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
