<?php

use kartik\switchinput\SwitchInput;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'options' => [
                    // 'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ],
                // 'fieldConfig' => [
                //     'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                //     'labelOptions' => ['class' => 'col-lg-3 control-label'],
                // ],
            ]); ?>

            <?= $form->field($model, 'nama_lengkap')->textInput() ?>

            <?= $form->field($model, 'nip')->textInput() ?>

            <?= $form->field($model, 'jabatan_id')->widget(Select2::classname(), [
                'data' => $jabatan,
                'options' => ['placeholder' => 'Select ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?php if (!$model->isNewRecord) { ?>
                <strong> Leave blank if not change password</strong>
                <div class="ui divider"></div>
                <?= $form->field($model, 'new_password') ?>
                <?= $form->field($model, 'repeat_password') ?>
            <?php } else { ?>

                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

            <?php } ?>

            <small class="label pull-right bg-orange">Only .p12</small>
                <?= $form->field($model, 'certificate')->fileInput() ?>

            <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'onText' => 'Active',
                    'offText' => 'Banned',
                ]
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
