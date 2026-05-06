<?php

namespace app\controllers;

use app\models\Report;
use Yii;
use app\models\ReportInvestigasi;
use app\models\search\ReportInvestigasi as ReportInvestigasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvestigasiController implements the CRUD actions for ReportInvestigasi model.
 */
class InvestigasiController extends Controller
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
     * Lists all ReportInvestigasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportInvestigasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReportInvestigasi model.
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

    /**
     * Creates a new ReportInvestigasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idReport)
    {
        // find id_report
        $findReport = Report::find()->where(['id' => $idReport])->one();
        if(!$findReport)
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if($findReport->investigasi){
            return $this->redirect(['view', 'id' => $findReport->investigasi->id]);
        }
        else{
            //cek role
            $isUnit = Yii::$app->db->createCommand("
                select *
                from auth_assignment
                where user_id = :id and item_name = 'unit'
            ")->bindValue(':id',Yii::$app->user->id)->queryOne();
            if(!$isUnit){
                Yii::$app->session->setFlash('error','Belum ada Investigasi');
                return $this->redirect(['/admin-report/index']);
            }
        }

        $model = new ReportInvestigasi(['id_report' => $idReport]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ReportInvestigasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // pengecekan tanggal
        // update maksimal H+7
        $timeDB = strtotime("+7 day",strtotime($model->created_date));
        $timeNow = strtotime("now");
        if($timeNow > $timeDB)
        {
            Yii::$app->session->setFlash('error','Update Investigasi Maximal 7Hari dari pembuatan awal');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ReportInvestigasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReportInvestigasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReportInvestigasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportInvestigasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
