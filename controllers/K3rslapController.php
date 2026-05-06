<?php

namespace app\controllers;

use kartik\mpdf\Pdf;
use Yii;
use app\models\K3rslap;
use app\models\search\K3rslap as K3rslapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * K3rslapController implements the CRUD actions for K3rslap model.
 */
class K3rslapController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all K3rslap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new K3rslapSearch([
            'publish' => 1
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single K3rslap model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTerima($id)
    {
        $model = $this->findModel($id);
        $model->penerimaLaporan = Yii::$app->user->id;
        $model->tglPenerima = date('Y-m-d H:i:s');
        if($model->save()){
            Yii::$app->session->setFlash('success','Laporan Diterima');
        }
        else{
            Yii::$app->session->setFlash('error','Laporan Gagal Diterima');
        }
        return $this->redirect(['view', 'id' => $model->id]);
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
    public function actionCreate()
    {
        $model = new K3rslap();
        $model->publish = 1;
        $model->createdDate = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->session->setFlash('success','Berhasil Create');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error','Gagal Create '.implode(', ',$model->getErrorSummary(true)));
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing K3rslap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->session->setFlash('success','Berhasil Update');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                Yii::$app->session->setFlash('error','Gagal Update '.implode(', ',$model->getErrorSummary(true)));
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing K3rslap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->publish = 2;
        if($model->save()){
            Yii::$app->session->setFlash('success','Berhasil Delete');
        }
        else{
            Yii::$app->session->setFlash('error','Gagal Delete');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the K3rslap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return K3rslap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = K3rslap::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
