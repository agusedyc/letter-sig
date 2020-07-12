<?php

use app\models\User;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */

$this->title = 'Disposisi Surat No : ';
$this->params['breadcrumbs'][] = ['label' => 'Disposisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<p>
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
</p>

<div class="surat-view">

    <h1><?= Html::encode('Isi Surat') ?></h1>

    <?= $this->render('_surat', [
        // 'model' => $model,
        'surat' => $surat,
    ]) ?>

</div>

<?php 
    // $model->letterDecrypt($model->ringkas_dispo,Yii::$app->user->identity->password,User::findOne($model->tujuan_id)->password);
    // echo '<pre>';
    // print_r($model->suratMasuk->user->password);
    // echo '<pre>';

 ?>

<div class="disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'tgl_terima',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            'tujuan_id',
            // [
            //     'label' => 'Tujuan Disposisi',
            //     'attribute' => 'id_tujuan_dispo',
            //     'format' => 'raw',
            //     'value' =>  function($model){
            //         return $model->tujuan->nama_lengkap;
            //     },
            // ],
            // 'ringkas_dispo',
            // $model->ringkas_dispo = $model->letterEncrypt($model->ringkas_dispo,Yii::$app->user->identity->password,User::findOne($model->tujuan_id)->password);
            [
                'label' => 'Disposisi',
                'attribute' => 'ringkas_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->letterDecrypt($model->ringkas_dispo,$model->suratMasuk->tujuanDispo->password,User::findOne($model->tujuan_id)->password);
                },
            ],
            'keterangan',
            
            // 'surat_masuk_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]) ?>

</div>
