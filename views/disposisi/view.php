<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */

$this->title = 'Disposisi Surat No : '.$surat->no_surat;
$this->params['breadcrumbs'][] = ['label' => 'Disposisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="disposisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </p>

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
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
            'ringkas_dispo',
            'keterangan',
            
            // 'surat_masuk_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]) ?>

</div>
