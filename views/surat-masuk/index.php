<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ((Mimin::checkRoute($this->context->id.'/create',true))) ?  Html::a(Yii::t('app', 'Create Surat Masuk'), ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'keamanan.keamanan',
            'kecepatan.kecepatan',
            'tgl_surat',
            'no_surat',
            'asal_surat',
            // 'tujuanDispo.nama_lengkap',
            [
                'label' => 'Tujuan Disposisi',
                'attribute' => 'tujuan_id',
                'format' => 'raw',
                'value' =>  function($model){
                    return $model->tujuanDispo->nama_lengkap;
                },
            ],
            [
                'label' => 'Status Disposisi',
                // 'attribute' => 'tujuan_id',
                'format' => 'raw',
                'value' =>  function($model){
                    if (!empty($model->disposisi)) {
                        return 'Tersidposisi';   
                    }else{
                        return 'Belum Disposisi';
                    }
                },
            ],
            // 'ringkas_surat',
            //'keterangan',
            //'tgl_terima',
            //'file',
            //'path_file',

            // ['class' => 'yii\grid\ActionColumn'],
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => Mimin::filterActionColumn([
                  'view','update','delete'
              ],$this->context->route),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
