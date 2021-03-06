<?php

use hscstudio\mimin\components\Mimin;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= ((Mimin::checkRoute($this->context->id.'/index',true))) ? Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) : null ?>
            <?=((Mimin::checkRoute($this->context->id.'/update',true))) ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
            <?= ((Mimin::checkRoute($this->context->id.'/delete',true))) ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) : null ?>
        </div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    'nama_lengkap',
                    [
                        'label' => 'Jabatan',
                        'attribute' => 'jabatan_id',
                        'format' => 'raw',
                        'value' =>  function($model){
                            return $model->jabatan->nama_jabatan;
                        },
                    ],
                    'nip',
                    'username',
                    // 'auth_key',
                    // 'password_hash',
                    // 'password_reset_token',
                    // 'email:email',
                    // 'status',
                    [
                        'label' => 'Status',
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' =>  function($model){
                            if ($model->status===1) {
                                return 'Aktif';   
                            }else{
                                return 'Tidak Aktif';
                            }
                        },
                    ],
                    [
                        'label' => 'Dibuat Oleh',
                        'attribute' => 'created_by',
                        'format' => 'raw',
                        'value' =>  function($model){
                            return $model->createdBy->nama_lengkap;
                        },
                    ],
                    [
                        'label' => 'Diupdate Oleh',
                        'attribute' => 'updated_by',
                        'format' => 'raw',
                        'value' =>  function($model){
                            return $model->updatedBy->nama_lengkap;
                        },
                    ],
                    // 'createBy.nama_lengkap',
                    // 'updatedBy.nama_lengkap',
                    'created_at:datetime',
                    'updated_at:datetime',
                    
                ],
            ]) ?>
        </div>
    </div>

    
<?php if (Yii::$app->user->identity->roles[0]->item_name==='Pengelola'): ?>
    <?php $form = ActiveForm::begin([]); ?>
    <?php
    echo $form->field($authAssignment, 'item_name')->widget(Select2::classname(), [
      'data' => $authItems,
      'options' => [
        'placeholder' => 'Select role ...',
      ],
      'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true,
      ],
    ])->label('Role'); ?>

    <div class="form-group">
        <?= Html::submitButton('Update', [
            'class' => $authAssignment->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            //'data-confirm'=>"Apakah anda yakin akan menyimpan data ini?",
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif ?>

</div>
