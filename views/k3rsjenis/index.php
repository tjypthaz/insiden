<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\K3rsjenis */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Insiden';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="k3rsjenis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jenis Insiden Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            [
                'attribute' => 'publish',
                'value' => function($model){
                    return $model->publish == '1' ? 'aktif' : 'dihapus';
                }
            ],
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
