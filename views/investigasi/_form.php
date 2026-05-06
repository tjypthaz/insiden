<?php

use app\models\Report;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportInvestigasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-investigasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_report')->hiddenInput()->label(false) ?>

    <?php $listBand = Report::getBand()?>
    <?= $form->field($model, 'id_band')->radioList($listBand) ?>

    <?= $form->field($model, 'penyebab')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'akar')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'rekomendasi')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'tindakan')->widget(yii\redactor\widgets\Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
