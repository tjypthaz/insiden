<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Verifikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifikasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_verifikator')->textInput() ?>

    <?= $form->field($model, 'id_band')->textInput() ?>

    <?= $form->field($model, 'id_jenis')->textInput() ?>

    <?= $form->field($model, 'aktivasi')->textInput() ?>

    <?= $form->field($model, 'investigasi')->textInput() ?>

    <?= $form->field($model, 'tindak_lanjut')->textInput() ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
