<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang di Aplikasi Pelaporan Insiden</h1>
        <div class="row">
            <div class="col-lg-6"><?=\yii\helpers\Html::a('Buat Laporan IKP', Url::to(['/report/index']),['class' => 'btn btn-lg btn-success'])?></div>
            <div class="col-lg-6"><?=\yii\helpers\Html::a('Buat Laporan K3RS', Url::to(['/k3rs/index']),['class' => 'btn btn-lg btn-info'])?></div>
        </div>
    </div>
</div>
