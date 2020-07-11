<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tujuan_dispo_id') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'asal_surat') ?>

    <?= $form->field($model, 'ringkas_surat') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'tgl_surat') ?>

    <?php // echo $form->field($model, 'tgl_terima') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'path_file') ?>

    <?php // echo $form->field($model, 'id_keamanan') ?>

    <?php // echo $form->field($model, 'id_kecepatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
