<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\K3rslap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="k3rslap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'namaTerlapor') ?>

    <?= $form->field($model, 'unitTerlapor') ?>

    <?= $form->field($model, 'tglJamKejadian') ?>

    <?= $form->field($model, 'jenisInsiden') ?>

    <?php // echo $form->field($model, 'kronologis') ?>

    <?php // echo $form->field($model, 'tindakanKejadian') ?>

    <?php // echo $form->field($model, 'penerimaLaporan') ?>

    <?php // echo $form->field($model, 'tglPenerima') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <?php // echo $form->field($model, 'modifiedBy') ?>

    <?php // echo $form->field($model, 'modifiedDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
