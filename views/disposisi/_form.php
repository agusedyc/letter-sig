<?php

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disposisi-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'tgl_terima')->textInput() ?> -->

    <?= $form->field($model, 'tgl_terima')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_keamanan')->widget(Select2::classname(), [
        'data' => $keamanan,
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_kecepatan')->widget(Select2::classname(), [
        'data' => $kecepatan,
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'tujuan_id')->textInput() ?> -->

    <?= $form->field($model, 'tujuan_id')->widget(Select2::classname(), [
        'data' => $users,
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'ringkas_dispo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'id_keamanan')->textInput() ?> -->

    <!-- <?= $form->field($model, 'id_kecepatan')->textInput() ?> -->

    <!-- <?= $form->field($model, 'surat_masuk_id')->textInput() ?> -->

    <?= $form->field($model, 'surat_masuk_id')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
