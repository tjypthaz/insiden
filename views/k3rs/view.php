<?php
use yii\helpers\Html;
?>
<?= Html::a('<i class="glyphicon glyphicon-backward" aria-hidden="true"></i> Kembali ke Home', ['/site/index'], ['class' => 'btn btn-success']) ?>
<span>&nbsp;</span>
<?= Html::a('<i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print Laporan', ['pdf', 'id' => $id], ['class' => 'btn btn-success']) ?>
