<?php

use app\models\Report;
use app\models\Unit;
use app\models\UserUnit;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Report */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'tanggal',
        'norm',
        [
            'attribute' => 'id_jenis',
            'value' => function($model, $key, $index, $column){
                return Report::getJenis($model->id_jenis);
            },
            'filter' => Report::getJenis()
        ],
        [
            'attribute' => 'id_band',
            'value' => function($model, $key, $index, $column){
                return Report::getBand($model->id_band);
            },
            'filter' => Report::getBand()
        ],
        [
            'attribute' => 'id_unit',
            'value' => function($model, $key, $index, $column){
                return $model->unit->nama;
            },
            'filter' => UserUnit::getUnits(Yii::$app->user->id)
        ],
        [
            'attribute' => 'id_verifikasi',
            'value' => function($model, $key, $index, $column){
                return empty($model->verifikasi) ? '-' : $model->verifikasi->verifikator->name ;
            },
            'filter' => false
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => ['style' => 'color:#337ab7'],
            'template' => "{view} {update} {delete} {inves}",
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                        'title' => Yii::t('app', 'View Pelaporan'),
                    ]);
                },
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'title' => Yii::t('app', 'Ubah Pelaporan'),
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                                'data-method' => 'post', 'data-pjax' => '0',
                    ]);
                },
                'inves' => function ($url, $model) {
                    $url = Url::to(['/investigasi/create','idReport' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, [
                        'title' => Yii::t('app', 'Investigasi Unit'),
                    ]);
                },
            ],
        ],
    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'clearBuffers' => true, //optional
        'filename' => 'report-'.time()
    ]);

    // You can choose to render your own GridView separately
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);
    ?>


</div>
