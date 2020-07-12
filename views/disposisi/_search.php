<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DisposisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disposisi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl_terima') ?>

    <?= $form->field($model, 'tujuan_id') ?>

    <?= $form->field($model, 'ringkas_dispo') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'id_keamanan') ?>

    <?php // echo $form->field($model, 'id_kecepatan') ?>

    <?php // echo $form->field($model, 'surat_masuk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
