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
        'model' => $findDisposisi,
        'attributes' => [
            // 'id',
            'tgl_terima',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            // 'tujuan_id',
            [
                'label' => 'Tujuan Disposisi',
                'attribute' => 'tujuan_id',
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
                    return $model->ringkas_dispo;
                },
            ],
            'keterangan',
            // 'surat_masuk_id',
        ],
    ]) ?>
</div>