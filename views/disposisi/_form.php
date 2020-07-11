<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disposisi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_terima')->textInput() ?>

    <?= $form->field($model, 'tujuan_id')->textInput() ?>

    <?= $form->field($model, 'ringkas_dispo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_keamanan')->textInput() ?>

    <?= $form->field($model, 'id_kecepatan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
