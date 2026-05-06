<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Unit */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
                'attribute' => 'id_kepala',
                'value' => function($model, $key, $index, $column){
                     /*echo "<pre>";
                     print_r($model->publish);
                     exit;*/
                    $unitNames = [];
                    foreach ($model->userUnits as $unit){
                        if($unit->publish != '2'){
                            $unitNames[] = $unit->user->name;
                        }
                    }
                    return Html::ul($unitNames, ['encode'=>false, 'class'=>'list-boxed']);
                    //return $model->userUnits;
                },
                'format' => 'raw'
            ],
            //'created_date',
            //'updated_by',
            //'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
