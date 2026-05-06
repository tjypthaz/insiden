<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_verifikasi') ?>

    <?= $form->field($model, 'pelapor') ?>

    <?= $form->field($model, 'norm') ?>

    <?= $form->field($model, 'biaya') ?>

    <?php // echo $form->field($model, 'id_jenis') ?>

    <?php // echo $form->field($model, 'id_unit') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'id_band') ?>

    <?php // echo $form->field($model, 'kronologi') ?>

    <?php // echo $form->field($model, 'no1_1') ?>

    <?php // echo $form->field($model, 'no1_2') ?>

    <?php // echo $form->field($model, 'no1_3') ?>

    <?php // echo $form->field($model, 'no1_4') ?>

    <?php // echo $form->field($model, 'no1_5') ?>

    <?php // echo $form->field($model, 'no2_1') ?>

    <?php // echo $form->field($model, 'no2_2') ?>

    <?php // echo $form->field($model, 'no2_3') ?>

    <?php // echo $form->field($model, 'no2_4') ?>

    <?php // echo $form->field($model, 'no2_5') ?>

    <?php // echo $form->field($model, 'no2_6') ?>

    <?php // echo $form->field($model, 'no2_7') ?>

    <?php // echo $form->field($model, 'no3_1') ?>

    <?php // echo $form->field($model, 'no3_2') ?>

    <?php // echo $form->field($model, 'no3_3') ?>

    <?php // echo $form->field($model, 'no3_4') ?>

    <?php // echo $form->field($model, 'no3_5') ?>

    <?php // echo $form->field($model, 'no3_6') ?>

    <?php // echo $form->field($model, 'no3_7') ?>

    <?php // echo $form->field($model, 'no3_8') ?>

    <?php // echo $form->field($model, 'no3_9') ?>

    <?php // echo $form->field($model, 'no4_1') ?>

    <?php // echo $form->field($model, 'no4_2') ?>

    <?php // echo $form->field($model, 'no4_3') ?>

    <?php // echo $form->field($model, 'no4_4') ?>

    <?php // echo $form->field($model, 'no4_5') ?>

    <?php // echo $form->field($model, 'no4_6') ?>

    <?php // echo $form->field($model, 'no4_7') ?>

    <?php // echo $form->field($model, 'no4_8') ?>

    <?php // echo $form->field($model, 'no4_9') ?>

    <?php // echo $form->field($model, 'no4_10') ?>

    <?php // echo $form->field($model, 'no5_1') ?>

    <?php // echo $form->field($model, 'no5_2') ?>

    <?php // echo $form->field($model, 'no5_3') ?>

    <?php // echo $form->field($model, 'no5_4') ?>

    <?php // echo $form->field($model, 'no5_5') ?>

    <?php // echo $form->field($model, 'no5_6') ?>

    <?php // echo $form->field($model, 'no5_7') ?>

    <?php // echo $form->field($model, 'no5_8') ?>

    <?php // echo $form->field($model, 'no5_9') ?>

    <?php // echo $form->field($model, 'no6_1') ?>

    <?php // echo $form->field($model, 'no6_2') ?>

    <?php // echo $form->field($model, 'no6_3') ?>

    <?php // echo $form->field($model, 'no6_4') ?>

    <?php // echo $form->field($model, 'no6_5') ?>

    <?php // echo $form->field($model, 'no6_6') ?>

    <?php // echo $form->field($model, 'no6_7') ?>

    <?php // echo $form->field($model, 'no6_8') ?>

    <?php // echo $form->field($model, 'no6_9') ?>

    <?php // echo $form->field($model, 'no6_10') ?>

    <?php // echo $form->field($model, 'no6_11') ?>

    <?php // echo $form->field($model, 'no7_1') ?>

    <?php // echo $form->field($model, 'no7_2') ?>

    <?php // echo $form->field($model, 'no7_3') ?>

    <?php // echo $form->field($model, 'no7_4') ?>

    <?php // echo $form->field($model, 'no7_5') ?>

    <?php // echo $form->field($model, 'no7_6') ?>

    <?php // echo $form->field($model, 'no8_1') ?>

    <?php // echo $form->field($model, 'no8_2') ?>

    <?php // echo $form->field($model, 'no8_3') ?>

    <?php // echo $form->field($model, 'no8_4') ?>

    <?php // echo $form->field($model, 'no8_5') ?>

    <?php // echo $form->field($model, 'no8_6') ?>

    <?php // echo $form->field($model, 'no8_7') ?>

    <?php // echo $form->field($model, 'no9_1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
