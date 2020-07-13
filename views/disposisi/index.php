<?php

use app\models\User;
use hscstudio\mimin\components\Mimin;
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
                'attribute' => 'no_surat',
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
            [
                'label' => 'Disposisi',
                'attribute' => 'ringkas_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->letterDecrypt($model->ringkas_dispo,$model->dibuat->password,$model->tujuan->password);
                },
            ],
            'keterangan',
            [
                'label' => 'Status Disposisi',
                // 'attribute' => 'tujuan_id',
                'format' => 'raw',
                'value' =>  function($model){
                    if (!empty($model->disposisi)) {
                        // return 'Terdisposisi';
                        return Html::a('Terisposisi', ['view', 'id' => $model->id]);
                    }else{
                        // return 'Belum Disposisi';
                        return Html::a('Buat Disposisi', ['create', 'id' => $model->id]);
                    }
                },
            ],
            
            // 'surat_masuk_id',
            'created_at:datetime',
            // 'created:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],


            // [
            //   'class' => 'yii\grid\ActionColumn',
            //   'template' => Mimin::filterActionColumn((Yii::$app->user->id==$model->created_by) ? ['view','update','delete'] : ['view'],$this->context->route),
            // ]
        ],
    ]) ?>

</div>
