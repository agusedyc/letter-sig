<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kecepatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecepatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kecepatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
