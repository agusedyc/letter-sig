<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nama_lengkap')->textInput() ?>

            <?= $form->field($model, 'nip')->textInput() ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?php if (!$model->isNewRecord) { ?>
                <strong> Leave blank if not change password</strong>
                <div class="ui divider"></div>
                <?= $form->field($model, 'new_password') ?>
                <?= $form->field($model, 'repeat_password') ?>
                <?= $form->field($model, 'old_password') ?>
            <?php } else { ?>

                <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

            <?php } ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
