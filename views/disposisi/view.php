<?php

use app\models\User;
use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */

$this->title = 'Disposisi Surat No : '.$model->suratMasuk->no_surat;
$this->params['breadcrumbs'][] = ['label' => 'Disposisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<p>
        <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
        <?php if (Yii::$app->user->id == $model->created_by): ?>
            <?=((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
            <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) : null ?>
        <?php endif ?>
        
    </p>

<div class="surat-view">

    <h1><?= Html::encode('Isi Surat') ?></h1>

    <?= $this->render('_surat', [
        'surat' => $surat,
    ]) ?>

</div>

<div class="disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'label' => 'Dibuat',
                // 'attribute' => 'tujuan_id',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->dibuat->nama_lengkap;
                },
            ],
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
