<?php

namespace app\controllers;

use app\models\K3rsjenis;
use app\models\Unit;
use Yii;
use yii\helpers\Json;


class K3rsrekapController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel([
            'tahun','berdasarkan','periode'
        ]);
        $model->addRule(['tahun','berdasarkan','periode'], 'required')
            ->addRule(['tahun','berdasarkan','periode'], 'integer');
        $result = [];
        if($model->load(Yii::$app->request->post())){
            // do somenthing with model
            $sql = "SELECT a.`unitTerlapor`,a.`tglJamKejadian`,a.`jenisInsiden`
                FROM `k3rslap` a
                WHERE a.`publish` = 1 AND YEAR(a.`tglJamKejadian`) = :tahun";

            if($model->periode == 1){
                $sql = $sql."";
            }
            elseif($model->periode == 2){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 1 AND 3";
            }
            elseif($model->periode == 3){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 4 AND 6";
            }
            elseif($model->periode == 4){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 7 AND 9";
            }
            elseif($model->periode == 5){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 10 AND 12";
            }
            elseif($model->periode == 6){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 1 AND 6";
            }
            elseif($model->periode == 7){
                $sql = $sql." AND MONTH(a.`tglJamKejadian`) BETWEEN 7 AND 12";
            }

            $datas = Yii::$app->db->createCommand($sql)->bindValue(':tahun', $model->tahun)
                ->queryAll();

            if($model->berdasarkan == '1'){
                $list = K3rsjenis::find()->where(['publish' => 1])->all();
                foreach ($list as $item){
                    $jan = 0;$feb = 0;$mar = 0;$apr = 0;$mei = 0;$jun = 0;
                    $jul = 0;$ags = 0;$sep = 0;$okt = 0;$nov = 0;$des = 0;
                    if($datas){
                        foreach ($datas as $data){
                            if($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 1){
                                $jan++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 2){
                                $feb++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 3){
                                $mar++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 4){
                                $apr++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 5){
                                $mei++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 6){
                                $jun++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 7){
                                $jul++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 8){
                                $ags++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 9){
                                $sep++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 10){
                                $okt++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 11){
                                $nov++;
                            }elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 12){
                                $des++;
                            }
                        }
                        $result[] = [
                            'item' => $item->nama,
                            'jan' => $jan,
                            'feb' => $feb,
                            'mar' => $mar,
                            'apr' => $apr,
                            'mei' => $mei,
                            'jun' => $jun,
                            'jul' => $jul,
                            'ags' => $ags,
                            'sep' => $sep,
                            'okt' => $okt,
                            'nov' => $nov,
                            'des' => $des,
                        ];
                    }
                    else{
                        $result[] = [
                            'item' => $item->nama,
                            'jan' => $jan,
                            'feb' => $feb,
                            'mar' => $mar,
                            'apr' => $apr,
                            'mei' => $mei,
                            'jun' => $jun,
                            'jul' => $jul,
                            'ags' => $ags,
                            'sep' => $sep,
                            'okt' => $okt,
                            'nov' => $nov,
                            'des' => $des,
                        ];
                    }

                }
            }
            else{
                $list = Unit::find()->where(['publish' => 1])->all();
                foreach ($list as $item){
                    $jan = 0;$feb = 0;$mar = 0;$apr = 0;$mei = 0;$jun = 0;
                    $jul = 0;$ags = 0;$sep = 0;$okt = 0;$nov = 0;$des = 0;
                    if($datas){
                        foreach ($datas as $data){
                            if($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 1){
                                $jan++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 2){
                                $feb++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 3){
                                $mar++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 4){
                                $apr++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 5){
                                $mei++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 6){
                                $jun++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 7){
                                $jul++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 8){
                                $ags++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 9){
                                $sep++;
                            }
                            elseif($data['unitTerlapor'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 10){
                                $okt++;
                            }
                            elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 11){
                                $nov++;
                            }elseif($data['jenisInsiden'] == $item->id && date('m',strtotime($data['tglJamKejadian'])) == 12){
                                $des++;
                            }
                        }
                        $result[] = [
                            'item' => $item->nama,
                            'jan' => $jan,
                            'feb' => $feb,
                            'mar' => $mar,
                            'apr' => $apr,
                            'mei' => $mei,
                            'jun' => $jun,
                            'jul' => $jul,
                            'ags' => $ags,
                            'sep' => $sep,
                            'okt' => $okt,
                            'nov' => $nov,
                            'des' => $des,
                        ];
                    }
                    else{
                        $result[] = [
                            'item' => $item->nama,
                            'jan' => $jan,
                            'feb' => $feb,
                            'mar' => $mar,
                            'apr' => $apr,
                            'mei' => $mei,
                            'jun' => $jun,
                            'jul' => $jul,
                            'ags' => $ags,
                            'sep' => $sep,
                            'okt' => $okt,
                            'nov' => $nov,
                            'des' => $des,
                        ];
                    }

                }
            }
        }
        return $this->render('index', [
            'model' => $model,
            'result' => $result
        ]);
    }
    public function actionExcel()
    {
        Yii::$app->controller->enableCsrfValidation = false;
        $json = Yii::$app->request->post('json');
        $berdasarkan = Yii::$app->request->post('berdasarkan');
        $periode = Yii::$app->request->post('periode');

        $excel_file_name = 'k3_rekap.xls';
        header("Content-type: text/csv");
        header("Content-type: application/octet-stream");//A MIME attachment with the content type "application/octet-stream" is a binary file.
        header("Content-type: application/x-msdownload");
        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header("Content-type: application/x-msdownload");
        //Typically, it will be an application or a document that must be opened in an application, such as a spreadsheet or word processor.
        header("Content-Disposition: attachment; filename=$excel_file_name");//with this extension of file name you tell what kind of file it is.
        header("Pragma: no-cache");//Prevent Caching
        header("Expires: 0");//Expires and 0 mean that the browser will not cache the page on your hard drive
        ?>
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <?php
                if($berdasarkan == 1){
                    ?><th>Jenis Insiden</th><?php
                }
                else{
                    ?><th>Nama Unit</th><?php
                }

                if($periode == 1 || $periode == 2 || $periode == 6){
                    ?><th>Jan</th><?php
                }
                if($periode == 1 || $periode == 2 || $periode == 6){
                    ?><th>Feb</th><?php
                }
                if($periode == 1 || $periode == 2 || $periode == 6){
                    ?><th>Mar</th><?php
                }
                if($periode == 1 || $periode == 3 || $periode == 6){
                    ?><th>Apr</th><?php
                }
                if($periode == 1 || $periode == 3 || $periode == 6){
                    ?><th>Mei</th><?php
                }
                if($periode == 1 || $periode == 3 || $periode == 6){
                    ?><th>Jun</th><?php
                }
                if($periode == 1 || $periode == 4 || $periode == 7){
                    ?><th>Jul</th><?php
                }
                if($periode == 1 || $periode == 4 || $periode == 7){
                    ?><th>Ags</th><?php
                }
                if($periode == 1 || $periode == 4 || $periode == 7){
                    ?><th>Sep</th><?php
                }
                if($periode == 1 || $periode == 5 || $periode == 7){
                    ?><th>Okt</th><?php
                }
                if($periode == 1 || $periode == 5 || $periode == 7){
                    ?><th>Nov</th><?php
                }
                if($periode == 1 || $periode == 5 || $periode == 7){
                    ?><th>Des</th><?php
                }
                ?>
            </tr>
            <?php
            $i=1;
            $result = Json::decode($json);
            if($result){
                foreach ($result as $item){
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$item['item']."</td>";
                    if($periode == 1 || $periode == 2 || $periode == 6){
                        echo "<td>".$item['jan']."</td>";
                    }
                    if($periode == 1 || $periode == 2 || $periode == 6){
                        echo "<td>".$item['feb']."</td>";
                    }
                    if($periode == 1 || $periode == 2 || $periode == 6){
                        echo "<td>".$item['mar']."</td>";
                    }
                    if($periode == 1 || $periode == 3 || $periode == 6){
                        echo "<td>".$item['apr']."</td>";
                    }
                    if($periode == 1 || $periode == 3 || $periode == 6){
                        echo "<td>".$item['mei']."</td>";
                    }
                    if($periode == 1 || $periode == 3 || $periode == 6){
                        echo "<td>".$item['jun']."</td>";
                    }
                    if($periode == 1 || $periode == 4 || $periode == 7){
                        echo "<td>".$item['jul']."</td>";
                    }
                    if($periode == 1 || $periode == 4 || $periode == 7){
                        echo "<td>".$item['ags']."</td>";
                    }
                    if($periode == 1 || $periode == 4 || $periode == 7){
                        echo "<td>".$item['sep']."</td>";
                    }
                    if($periode == 1 || $periode == 5 || $periode == 7){
                        echo "<td>".$item['okt']."</td>";
                    }
                    if($periode == 1 || $periode == 5 || $periode == 7){
                        echo "<td>".$item['nov']."</td>";
                    }
                    if($periode == 1 || $periode == 5 || $periode == 7){
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
        exit;
    }
}
