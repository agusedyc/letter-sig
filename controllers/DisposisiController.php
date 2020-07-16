<?php

namespace app\controllers;

use Yii;
use app\models\Disposisi;
use app\models\DisposisiSearch;
use app\models\Keamanan;
use app\models\Kecepatan;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use app\models\User;
use mzk10k\tcpdf\TCPDF;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DisposisiController implements the CRUD actions for Disposisi model.
 */
class DisposisiController extends Controller
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
     * Lists all Disposisi models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $surat = SuratMasuk::findOne($id);
        $searchModel = new DisposisiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['tujuan_id' => Yii::$app->user->id]);
        $dataProvider->query->orWhere(['created_by' => Yii::$app->user->id]);

        return $this->render('index', [
            // 'surat' => $surat,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Disposisi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   $model = $this->findModel($id);
        $surat = SuratMasuk::findOne($model->suratMasuk->id);
        return $this->render('view', [
            'model' => $model,
            'surat' => $surat,
        ]);
    }

    /**
     * Creates a new Disposisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $findDisposisi = $this->findModel($id);
        $model = new Disposisi();
        $surat = SuratMasuk::findOne($findDisposisi->surat_masuk_id);
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            $model->surat_masuk_id = $findDisposisi->surat_masuk_id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);   
            }
        }

        

        return $this->render('create', [
            'findDisposisi' => $findDisposisi,
            'model' => $model,
            'surat' => $surat,
            'users' => $users,
            'keamanan' => $keamanan,
            'kecepatan' => $kecepatan,
        ]);
    }

    /**
     * Creates a new Disposisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSuratCreate($id)
    {
        // $findDisposisi = $this->findModel($id);
        $model = new Disposisi();
        $surat = SuratMasuk::findOne($id);
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            // Encript Disposisi By Create
            // $model->ringkas_dispo = $model->letterEncrypt($this->ringkas_dispo,$this->dibuat->password,$this->tujuan->password);
            $model->surat_masuk_id = $id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);   
            }
        }

        

        return $this->render('surat-create', [
            // 'findDisposisi' => $findDisposisi,
            'model' => $model,
            'surat' => $surat,
            'users' => $users,
            'keamanan' => $keamanan,
            'kecepatan' => $kecepatan,
        ]);
    }

    /**
     * Updates an existing Disposisi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $model->ringkas_dispo = $model->letterDecrypt($model->ringkas_dispo,$model->suratMasuk->tujuanDispo->password,User::findOne($model->tujuan_id)->password);
        $surat = SuratMasuk::findOne($id);
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            // $model->ringkas_dispo = $model->letterEncrypt($model->ringkas_dispo,Yii::$app->user->identity->password,User::findOne($model->tujuan_id)->password);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);    
            }
        }

        return $this->render('update', [
            'model' => $model,
            'surat' => $surat,
            'users' => $users,
            'keamanan' => $keamanan,
            'kecepatan' => $kecepatan,
        ]);
    }

    /**
     * Deletes an existing Disposisi model.
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
     * Finds the Disposisi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Disposisi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disposisi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCetak($id)
    {
        $model = $this->findModel($id);
        $surat = SuratMasuk::findOne($model->suratMasuk->id);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($model->dibuat->nama_lengkap);
        $pdf->SetTitle('Surat dari '.$surat->asal_surat.', Nomor : '.$surat->no_surat);
        $pdf->SetSubject('Disposisi Surat No:'.$surat->no_surat);
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // ---------------------------------------------------------

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = $this->renderPartial('cetak-disposisi', [
            'model' => $model,
            'surat' => $surat,
        ]);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Disposisi Surat No :'.$surat->no_surat.' Oleh : '.$model->dibuat->nama_lengkap.'.pdf', 'I');

        
    }
}
