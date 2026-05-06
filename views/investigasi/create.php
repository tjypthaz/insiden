<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportInvestigasi */

$this->title = 'Create Report Investigasi';
$this->params['breadcrumbs'][] = ['label' => 'Report Investigasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-investigasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
