<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KecepatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kecepatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecepatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ((Mimin::checkRoute($this->context->id.'/create',true))) ?  Html::a(Yii::t('app', 'Create Kecepatan'), ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'kecepatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
