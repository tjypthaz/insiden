<?php

use app\models\Unit;
use app\models\Users;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserUnit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $listUser = ArrayHelper::map(Users::find()->where([
        'status' => 10,
    ])->asArray()->all(),'id','name');
    ?>
    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
        'data' => $listUser,
        'options' => [
            'placeholder' => 'Pilih User',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?php $listUnit = ArrayHelper::map(Unit::find()->asArray()->all(),'id','nama'); ?>
    <?= $form->field($model, 'id_unit')->widget(Select2::classname(), [
        'data' => $listUnit,
        'options' => [
            'placeholder' => 'Pilih Unit',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
