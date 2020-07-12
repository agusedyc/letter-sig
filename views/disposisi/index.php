<?php

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

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderSuratMasuk,
        'filterModel' => $searchModelSuratMasuk,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            // 'no_surat',
            [
                'label' => 'Nomor Surat',
                'attribute' => 'no_surat',
                'format' => 'raw',
                'value' =>  function($model){
                    return Html::a($model->no_surat, ['disposisi/create', 'id' => $model->id], ['title' => 'Create Disposisi']);
                },
            ],
            'tgl_surat',
            'asal_surat',
            // 'tujuanDispo.nama_lengkap',
            // [
            //     'label' => 'Tujuan Disposisi',
            //     'attribute' => 'tujuan_id',
            //     'format' => 'raw',
            //     'value' =>  function($model){
            //         return $model->tujuanDispo->nama_lengkap;
            //     },
            // ],
            // 'ringkas_surat',
            //'keterangan',
            //'tgl_terima',
            //'file',
            //'path_file',

            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
