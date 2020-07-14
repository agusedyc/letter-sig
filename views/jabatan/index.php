<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Jabatan', ['create'], ['class' => 'btn btn-success']) ?> -->
        <?= ((Mimin::checkRoute($this->context->id.'/create',true))) ?  Html::a(Yii::t('app', 'Create Jabatan'), ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama_jabatan',

            ['class' => 'yii\grid\ActionColumn'],
            // [
            //   'class' => 'yii\grid\ActionColumn',
            //   'template' => Mimin::filterActionColumn([
            //       'update','delete','download'
            //   ],$this->context->route),
            // ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
