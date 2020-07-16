<?php

namespace app\controllers;

use Yii;
use app\models\Jabatan;
use app\models\User;
use app\models\UserSearch;
use hscstudio\mimin\models\AuthAssignment;
use hscstudio\mimin\models\AuthItem;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $authAssignments = AuthAssignment::find()->where([
            'user_id' => $model->id,
        ])->column();

        $authItems = ArrayHelper::map(
            AuthItem::find()->where([
                'type' => 1,
            ])->asArray()->all(),
            'name', 'name');

        $authAssignment = new AuthAssignment([
            'user_id' => $model->id,
        ]);

        if (Yii::$app->request->post()) {
            $authAssignment->load(Yii::$app->request->post());
            // delete all role
            AuthAssignment::deleteAll(['user_id' => $model->id]);
            if (is_array($authAssignment->item_name)) {
                foreach ($authAssignment->item_name as $item) {
                    if (!in_array($item, $authAssignments)) {
                        $authAssignment2 = new AuthAssignment([
                            'user_id' => $model->id,
                        ]);
                        $authAssignment2->item_name = $item;
                        $authAssignment2->created_at = time();
                        $authAssignment2->save();

                        $authAssignments = AuthAssignment::find()->where([
                            'user_id' => $model->id,
                        ])->column();
                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Data tersimpan');
        }
        $authAssignment->item_name = $authAssignments;
        return $this->render('view', [
            'model' => $model,
            'authAssignment' => $authAssignment,
            'authItems' => $authItems,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $jabatan = ArrayHelper::map(Jabatan::find()->asArray()->all(), 'id', 'nama_jabatan');

        if ($model->load(Yii::$app->request->post())) {

            $model->setPassword($model->password);
            $model->status = $model->status==1?1:0;
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'User berhasil dibuat dengan password [$model->password]');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error',$model->getErrors());
                return $this->redirect(['index']);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
                'jabatan' => $jabatan,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $jabatan = ArrayHelper::map(Jabatan::find()->asArray()->all(), 'id', 'nama_jabatan');

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->new_password);  
            $model->status = $model->status==1?1:0;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);   
            }
        }

        return $this->render('update', [
            'model' => $model,
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
