<?php

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat">
    <?= DetailView::widget([
        'model' => $surat,
        'attributes' => [
            // 'id',
            // 'tujuanDispo.nama_lengkap',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            'tgl_surat',
            'tgl_terima',
            'no_surat',
            // [
            //     'label' => 'Document',
            //     'attribute' => 'file',
            //     'format' => 'raw',
            //     'value' => function($data){
            //         return '<iframe src="https://docs.google.com/viewer?url='.Yii::$app->request->hostInfo.'/'.$data->file.'&embedded=true" style="width:95%; height:500%;" frameborder="0"></iframe>';
            //     },
            // ],
            'asal_surat',
            'ringkas_surat',
            'keterangan',
            [
                'label' => 'Tujuan Disposisi',
                'attribute' => 'id_tujuan_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->tujuanDispo->nama_lengkap;
                },
            ],
            // 'file',
            // 'path_file',
            // 'id_keamanan',
        ],
    ]) ?>
</div>