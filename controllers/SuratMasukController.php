<?php

namespace app\controllers;

use Yii;
use app\models\Keamanan;
use app\models\Kecepatan;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use app\models\User;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
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

    public function actionDisposisi()
    {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['tujuan_dispo_id' => Yii::$app->user->id]);

        return $this->render('disposisi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
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
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratMasuk();
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'file');
            if (!empty($image) && $image->size !== 0) {
                $path = 'uploads/surat';
                FileHelper::createDirectory($path);
                $image->saveAs($path.'/'.$image->name);
                $model->file = $path.'/'.$image->name;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);   
            }else{
                Yii::$app->session->setFlash('error',$model->getErrors());
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
            'keamanan' => $keamanan,
            'kecepatan' => $kecepatan,
        ]);
    }

    /**
     * Updates an existing SuratMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_file = $model->file;
        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama_lengkap');
        $keamanan = ArrayHelper::map(Keamanan::find()->asArray()->all(), 'id', 'keamanan');
        $kecepatan = ArrayHelper::map(Kecepatan::find()->asArray()->all(), 'id', 'kecepatan');

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'file');
            if (!empty($image) && $image->size !== 0) {
                $path = 'uploads/surat';
                FileHelper::createDirectory($path);
                $image->saveAs($path.'/'.$image->name);
                $model->file = $path.'/'.$image->name;
            }else{
                $model->file = $current_file;  
            }
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);   
            }else{
                Yii::$app->session->setFlash('error',$model->getErrors());
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'users' => $users,
            'keamanan' => $keamanan,
            'kecepatan' => $kecepatan,
        ]);
    }

    /**
     * Deletes an existing SuratMasuk model.
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
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
