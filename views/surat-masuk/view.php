<?php

use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = $model->no_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-masuk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
        <?=((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
        <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) : null ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'tujuanDispo.nama_lengkap',
            [
                'label' => 'Tujuan Disposisi',
                'attribute' => 'id_tujuan_dispo',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->tujuanDispo->nama_lengkap;
                },
            ],
            'no_surat',
            [
                'label' => 'Document',
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function($data){
                    // return '<iframe src="https://docs.google.com/viewer?url='.Yii::$app->request->hostInfo.'/'.$data->file.'&embedded=true" style="width:95%; height:500%;" frameborder="0"></iframe>';
                    return Html::a('Download Surat',[$data->file]);
                },
            ],
            'asal_surat',
            'ringkas_surat',
            'keterangan',
            'tgl_surat',
            'tgl_terima',
            // 'file',
            // 'path_file',
            // 'id_keamanan',
            'keamanan.keamanan',
            // 'id_kecepatan',
            'kecepatan.kecepatan',
        ],
    ]) ?>

</div>
