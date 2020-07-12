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
        $searchModelSuratMasuk = new SuratMasukSearch();
        $dataProviderSuratMasuk = $searchModelSuratMasuk->search(Yii::$app->request->queryParams);
        $dataProviderSuratMasuk->query->where(['tujuan_dispo_id' => Yii::$app->user->id]);

        return $this->render('index', [
            'dataProviderSuratMasuk' => $dataProviderSuratMasuk,
            'searchModelSuratMasuk' => $searchModelSuratMasuk,

        ]);
    }

    /**
     * Displays a single Disposisi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $surat = SuratMasuk::findOne($id);
        $searchModel = new DisposisiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['surat_masuk_id' => $id]);
        return $this->render('view', [
            'surat' => $surat,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Disposisi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Disposisi();
        $surat = SuratMasuk::findOne($id);
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            $model->surat_masuk_id = $id;            
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);   
        }

        return $this->render('create', [
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
        // $surat = SuratMasuk::findOne($model->surat;
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
}
