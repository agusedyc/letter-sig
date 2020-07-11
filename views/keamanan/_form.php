<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Keamanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keamanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'keamanan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
