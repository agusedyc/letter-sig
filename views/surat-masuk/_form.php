<?php

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">

    <?php $form = ActiveForm::begin([
                    // 'id' => 'profile-form',
                    // 'method' => 'post',
                    // 'action' => ['register-jurnal/index'],
                    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    // 'enableAjaxValidation' => true,
                    // 'enableClientValidation' => false,
                    // 'validateOnBlur' => false,
                ]); ?>

    <!-- <?= $form->field($model, 'tujuan_dispo_id')->textInput() ?> -->

    <div class="form-group">
        <label class="col-lg-3 control-label">Keamanan</label>
        <div class="col-lg-9">
            <?php 
                echo Select2::widget([
                    'name' => 'id_keamanan',
                    'data' => $keamanan,
                    'value' => $model->id_keamanan,
                    'options' => [
                        'placeholder' => 'Select ...',
                        // 'class' => 'form-control',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
             ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Kecepatan</label>
        <div class="col-lg-9">
            <?php 
                echo Select2::widget([
                    'name' => 'id_kecepatan',
                    'data' => $kecepatan,
                    'value' => $model->id_kecepatan,
                    'options' => [
                        'placeholder' => 'Select ...',
                        // 'class' => 'form-control',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
             ?>
        </div>
    </div>

    <?= $form->field($model, 'no_surat')->textInput() ?>

    <!-- <?= $form->field($model, 'tgl_surat')->textInput() ?> -->

    <?= $form->field($model, 'tgl_surat')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_terima')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'tgl_terima')->textInput() ?> -->

    <?= $form->field($model, 'asal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ringkas_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="col-lg-3 control-label">Tujuan Disposisi</label>
        <div class="col-lg-9">
            <?php 
                echo Select2::widget([
                    'name' => 'tujuan_dispo_id',
                    'data' => $users,
                    'value' => $model->tujuan_dispo_id,
                    'options' => [
                        'placeholder' => 'Select ...',
                        // 'class' => 'form-control',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
             ?>
        </div>
    </div>

    <!-- <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?> -->

    <small class="label pull-right bg-orange">Only .pdf</small>
                <?= $form->field($model, 'file')->fileInput() ?>

    <!-- <?= $form->field($model, 'path_file')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'id_keamanan')->textInput() ?> -->

    <!-- <?= $form->field($model, 'id_kecepatan')->textInput() ?> -->

    <div class="form-group">
        <label class="col-lg-3 control-label"></label>
        <div class="col-lg-9">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

           </div>
        </div>
    </div>
</div>
