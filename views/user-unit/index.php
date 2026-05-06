<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserUnit */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'namaUser',
                'value' => function($model){
                    return $model->user->name;
                }
            ],
            [
                'attribute' => 'namaUnit',
                'value' => function($model){
                    return $model->unit->nama;
                }
            ],
            //'id_user',
            //'id_unit',
            //'publish',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
