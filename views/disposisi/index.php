<?php

use app\models\User;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DisposisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disposisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disposisi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Disposisi', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            [
                'label' => 'Nomor Surat',
                // 'attribute' => 'id_tujuan_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->suratMasuk->no_surat;
                },
            ],
            'tgl_terima',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            // 'tujuan_id',
            [
                'label' => 'Tujuan Disposisi',
                'attribute' => 'id_tujuan_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->tujuan->nama_lengkap;
                },
            ],
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
