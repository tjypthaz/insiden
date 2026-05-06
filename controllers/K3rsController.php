<?php

namespace app\controllers;

use app\models\K3rslap;
use kartik\mpdf\Pdf;
use Yii;
use yii\web\NotFoundHttpException;
use GuzzleHttp\Client;

class K3rsController extends \yii\web\Controller
{
    public function actionView($id)
    {
        return $this->render('view', [
            'id' => $id,
        ]);
    }

    public function actionPdf($id){
        $data = $this->findModel($id);
        /*return $this->renderPartial('cetak_formulir',[
            'data' => $data
        ]);*/
        $content = $this->renderPartial('cetak_formulir',[
            'data' => $data
        ]);

        $odd = [
            'L' => ['content' => $this->renderPartial('logo_formulir')],
            'C' => ['content' => $this->renderPartial('header_formulir')],
            //'R' => ['content' => $this->renderPartial('@admin/views/contract/pdf/contract-header-right')]
        ];

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'marginTop' => 24,
            'marginHeader' => 4,
            // set to use core fonts only
            'mode' => Pdf::MODE_ASIAN,
            // A4 paper format
            'format' => Pdf::FORMAT_FOLIO,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Formulir Insiden'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=> [
                    ['odd' => $odd],
                    ['even' => $odd],
                ],
                'SetFooter'=> false,
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Creates a new K3rslap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new K3rslap();
        $model->publish = 1;
        $model->createdDate = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
				try {
					$response = Yii::$app->telegram->sendMessage([
						'chat_id' => '1094391597',
						'text' => 'Ada Laporan K3RS Baru, Segera cek aplikasi insiden RSUD RAA TjokroNegoro',
						'parse_mode' => 'HTML',
					]);
				} catch (ClientException $e) {
					$body = $e->getResponse()->getBody()->getContents();
					$response = json_decode($body, true);
				}

				if (!$response['ok']) {
					Yii::$app->session->setFlash('error',$response['description']);
				}
				else{
					Yii::$app->session->setFlash('success','Berhasil Membuat Laporan');
				}
				
                // Yii::$app->mailer->compose()
                //     ->setFrom(Yii::$app->params['adminEmail'])
                //     ->setTo('angelw322@gmail.com')
                //     ->setSubject('Insiden Petugas '.date('Y-m-d H:i:s'))
                //     ->setHtmlBody('
                //     <p><b>Ada yang laporan masuk!! Cek Website Insiden SEKARANG!!</b>
                //     <a href="http://194.169.46.193/insiden" target="_BLANK">Klik Disini</a></p>
                //     <p><b>Website Hanya BISA diakses dengan WIFI RS : wifi.kominfo@smartcity & Jaringan Lokal RS</b></p>
                //     ')
                //     ->send();
                

                /*$client = new Client([
					'headers' => [
						'Content-Type' => 'application/json',
						'Accept' => 'application/json',
					],
				]);
                $client->request('POST', 'http://194.169.46.193:8000/send-message',
                    [
                        'json' => [
                            'to' => '082232803809',
                            'message' => 'Ada Laporan K3RS Baru, Segera cek aplikasi insiden RSUD RAA TjokroNegoro'
                        ]
                    ]
                );*/
				
                /*if(in_array($model->jenisInsiden, [1,2,3,4,6,9])){
                    $client->request('POST', 'http://194.169.46.193:8000/send-message',
                        [
                            'json' => [
                                'to' => '082232803809',
                                'message' => 'Ada Laporan K3RS Baru, Segera cek aplikasi insiden RSUD RAA TjokroNegoro'
                            ]
                        ]
                    );
                }*/
                
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error','Gagal Create '.implode(', ',$model->getErrorSummary(true)));
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = K3rslap::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
