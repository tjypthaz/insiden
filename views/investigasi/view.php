<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportInvestigasi */

$this->title = 'Investigasi';
$this->params['breadcrumbs'][] = ['label' => 'Report Investigasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="report-investigasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_band',
                'value' => function($model){
                    return \app\models\Report::getBand($model->id_band);
                }
            ],
            [
                'attribute' => 'penyebab',
                'format' => 'raw',
            ],
            [
                'attribute' => 'akar',
                'format' => 'raw',
            ],
            [
                'attribute' => 'rekomendasi',
                'format' => 'raw',
            ],
            [
                'attribute' => 'tindakan',
                'format' => 'raw',
            ],
            [
                'attribute' => 'created_by',
                'value' => function($model){
                    return \app\models\Users::getName($model->created_by);
                }
            ],
            'created_date',
            [
                'attribute' => 'updated_by',
                'value' => function($model){
                    return \app\models\Users::getName($model->updated_by);
                }
            ],
            'updated_date',
        ],
        'template' => "<tr><th style='width: 15%;'>{label}</th><td>{value}.</td></tr>"
    ]) ?>

</div>
