<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\K3rslap */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'K3rslaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="k3rslap-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-print" aria-hidden="true"></i> Pdf', ['pdf', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php
        if($model->penerimaLaporan == ''){
            echo Html::a('Laporan Diterima', ['terima', 'id' => $model->id], ['class' => 'btn btn-warning']);
        }
        ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'namaTerlapor',
            'unit.nama',
            'tglJamKejadian',
            'jenis.nama',
            [
                'attribute' => 'kronologis',
                'value' => function($model){
                    return $model->kronologis;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'tindakanKejadian',
                'value' => function($model){
                    return $model->tindakanKejadian;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'penerimaLaporan',
                'value' => function($model){
                    return $model->penerimaLaporan != '' ? $model->penerima->name : '-';
                },
            ],
            'tglPenerima',
            'publish',
            'createdBy',
            'createdDate',
            'modified.name',
            'modifiedDate',
        ],
    ]) ?>

</div>
