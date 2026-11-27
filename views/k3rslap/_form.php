<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\K3rslap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="k3rslap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'namaTerlapor')->textInput(['maxlength' => true]) ?>

    <?php
    $listStatusKorban = \app\models\K3rslap::getStatusKorbans();
    ?>
    <?= $form->field($model, 'statusKorban')->dropDownList($listStatusKorban,[
            'prompt' => "Pilih Status Korban"
    ]) ?>

    <?= $form->field($model, 'lokasiKejadian')->textInput(['maxlength' => true,'placeholder' => 'Lokasi Terjadinya Insiden']) ?>

    <?= $form->field($model, 'tglJamKejadian')->widget(\dosamigos\datetimepicker\DateTimePicker::className(),[
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        //'inline' => true,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
            //'format' => 'HH:ii P', // if inline = false
            'todayBtn' => true
        ]
    ]) ?>

    <?php
    $listJenis = \app\models\K3rsjenis::getJeniss();
    ?>
    <?= $form->field($model, 'jenisInsiden')->dropDownList($listJenis,[
            'prompt' => "Pilih Jenis Insiden"
    ]) ?>

    <?= $form->field($model, 'kronologis')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'tindakanKejadian')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'createdBy')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
