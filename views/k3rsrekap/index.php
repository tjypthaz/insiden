<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "Rekap K3RS";
?>
<h1><?=$this->title?></h1>
<hr>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $listMethod = [
        1 => 'Jenis Insiden',
        2 => 'Unit',
    ];
    echo $form->field($model, 'berdasarkan')->dropDownList($listMethod,[
        'prompt' => 'Pilih Metode'
    ]);
    ?>

    <?php
    $listPeriode = [
        1 => 'Bulanan',
        2 => 'Triwulan Pertama',
        3 => 'Triwulan Kedua',
        4 => 'Triwulan Ketiga',
        5 => 'Triwulan Keempat',
        6 => 'Semester Awal',
        7 => 'Semester Akhir',

    ];
    echo $form->field($model, 'periode')->dropDownList($listPeriode,[
        'prompt' => 'Pilih Periode'
    ]);
    ?>

    <?= $form->field($model, 'tahun') ?>


    <div class="form-group">
        <?= Html::submitButton('Lihat Data', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- form -->

<?php
if(Yii::$app->request->isPost){
    ?>
    <h2>Rekap Berdasarkan <?=$listMethod[$model->berdasarkan]?> <?=$listPeriode[$model->periode]?> Tahun <?=$model->tahun?></h2>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <?php
            if($model->berdasarkan == 1){
                ?><th>Jenis Insiden</th><?php
            }
            else{
                ?><th>Nama Unit</th><?php
            }

            if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                ?><th>Jan</th><?php
            }
            if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                ?><th>Feb</th><?php
            }
            if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                ?><th>Mar</th><?php
            }
            if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                ?><th>Apr</th><?php
            }
            if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                ?><th>Mei</th><?php
            }
            if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                ?><th>Jun</th><?php
            }
            if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                ?><th>Jul</th><?php
            }
            if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                ?><th>Ags</th><?php
            }
            if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                ?><th>Sep</th><?php
            }
            if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                ?><th>Okt</th><?php
            }
            if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                ?><th>Nov</th><?php
            }
            if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                ?><th>Des</th><?php
            }
            ?>
        </tr>
        <?php
        $i=1;
        if($result){
            foreach ($result as $item){
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$item['item']."</td>";
                if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                    echo "<td>".$item['jan']."</td>";
                }
                if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                    echo "<td>".$item['feb']."</td>";
                }
                if($model->periode == 1 || $model->periode == 2 || $model->periode == 6){
                    echo "<td>".$item['mar']."</td>";
                }
                if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                    echo "<td>".$item['apr']."</td>";
                }
                if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                    echo "<td>".$item['mei']."</td>";
                }
                if($model->periode == 1 || $model->periode == 3 || $model->periode == 6){
                    echo "<td>".$item['jun']."</td>";
                }
                if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                    echo "<td>".$item['jul']."</td>";
                }
                if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                    echo "<td>".$item['ags']."</td>";
                }
                if($model->periode == 1 || $model->periode == 4 || $model->periode == 7){
                    echo "<td>".$item['sep']."</td>";
                }
                if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                    echo "<td>".$item['okt']."</td>";
                }
                if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                    echo "<td>".$item['nov']."</td>";
                }
                if($model->periode == 1 || $model->periode == 5 || $model->periode == 7){
                    echo "<td>".$item['des']."</td>";
                }
                echo "</tr>";
                $i++;
            }
        }
        else{
            echo "<tr>";
            echo "<td colspan='3' class='text-center'>Data Tidak Ditemukan</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    $jsonResult = \yii\helpers\Json::encode($result);
    ?>
    <form action="<?=\yii\helpers\Url::to(['excel'])?>" method="post">
        <input type="hidden" name="json" value="<?=htmlspecialchars($jsonResult)?>">
        <input type="hidden" name="berdasarkan" value="<?=$model->berdasarkan?>">
        <input type="hidden" name="periode" value="<?=$model->periode?>">
        <input type="submit" name="submit" class="btn btn-success" value="Export Excel">
    </form>
    <?php
    /*echo Html::a('Export Excel',[
        'excel',
        'data' => $jsonResult,
        'berdasarkan' => $model->berdasarkan,
        'periode' => $model->periode
    ],['class' => 'btn btn-success']);*/
}
?>
