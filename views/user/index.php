<?php

use hscstudio\mimin\components\Mimin;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= ((Mimin::checkRoute($this->context->id.'/create',true))) ?  Html::a(Yii::t('app', 'Create Users'), ['create'], ['class' => 'btn btn-success']) : null ?>
        </div>
        <div class="panel-body table-responsive">
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'nama_lengkap',
                    'nip',
                    'username',
                    // 'auth_key',
                    // 'password_hash',
                    // 'password_reset_token',
                    //'email:email',
                    // 'status',
                    'created_at:datetime',
                    'updated_at:datetime',
                    //'verification_token',

                    ['class' => 'yii\grid\ActionColumn'],
                    // [
                    //   'class' => 'yii\grid\ActionColumn',
                    //   'template' => Mimin::filterActionColumn([
                    //       'view','update','delete'
                    //   ],$this->context->route),
                    // ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>

    

</div>
