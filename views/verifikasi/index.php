<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Verifikasi */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifikasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Verifikasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_verifikator',
            'id_band',
            'id_jenis',
            'aktivasi',
            //'investigasi',
            //'tindak_lanjut',
            //'kesimpulan:ntext',
            //'publish',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
