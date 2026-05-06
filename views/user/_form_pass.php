<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <strong> Leave blank if not change password</strong>
    <div class="ui divider"></div>
    <?= $form->field($model, 'new_password') ?>
    <?= $form->field($model, 'repeat_password') ?>
    <?= $form->field($model, 'old_password') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
