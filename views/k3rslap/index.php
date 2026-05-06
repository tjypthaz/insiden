<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\K3rslap */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelaporan K3RS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="k3rslap-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laporan Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'namaTerlapor',
            [
                'attribute' => 'unitTerlapor',
                'value' => function($model){
                    return $model->unit->nama;
                }
            ],
            //'unitTerlapor',
            'tglJamKejadian',
            [
                'attribute' => 'jenisInsiden',
                'value' => function($model){
                    return $model->jenis->nama;
                }
            ],
            //'jenisInsiden',
            //'kronologis:ntext',
            //'tindakanKejadian:ntext',
            //'penerimaLaporan',
            //'tglPenerima',
            //'publish',
            //'createdBy',
            //'createdDate',
            //'modifiedBy',
            //'modifiedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
