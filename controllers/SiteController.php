<?php

namespace app\controllers;

use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\SuratMasuk;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        if (Yii::$app->user->identity->created_by===Yii::$app->user->identity->updated_by || empty(Yii::$app->user->identity->certificate)) {
            Yii::$app->session->setFlash('warning', 'Silahkan Ganti Password dan Upload File Certificate P12');
                return $this->redirect(['user/update', 'id' => Yii::$app->user->id]);
        }
        $suratMasuk = SuratMasuk::find();
        $jmlSuratMasuk = $suratMasuk->count();
        $sudahDisposisi = 0;
        $belumDisposisi = 0;
        foreach ($suratMasuk->all() as $value) {
            if (!empty($value->disposisi)) {
                // echo 'Tersidposisi';   
                $sudahDisposisi++;
            }else{
                // echo 'Belum Disposisi';
                $belumDisposisi++;
            }
        }

        $sudahSayaDisposisi = 0;
        $belumSayaDisposisi = 0;
        $suratMasukSaya = $suratMasuk->where(['tujuan_dispo_id' => Yii::$app->user->identity->id])->count();
        foreach ($suratMasuk->where(['tujuan_dispo_id' => Yii::$app->user->id])->all() as $value) {
            if (!empty($value->disposisi)) {
                // echo 'Tersidposisi';   
                $sudahSayaDisposisi++;
            }else{
                // echo 'Belum Disposisi';
                $belumSayaDisposisi++;
            }
        }

        // echo '<pre>';
        // print_r(Yii::$app->user->identity->created_by);
        // echo '<br>';
        // print_r($suratTerdisposisi);
        // echo '</pre>';
        return $this->render('index',[
            'jmlSuratMasuk' => $jmlSuratMasuk,
            'sudahDisposisi' => $sudahDisposisi,
            'belumDisposisi' => $belumDisposisi,
            'suratMasukSaya' => $suratMasukSaya,
            'sudahSayaDisposisi' => $sudahSayaDisposisi,
            'belumSayaDisposisi' => $belumSayaDisposisi,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->passwordin = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
