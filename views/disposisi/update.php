<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */

$this->title = 'Update Disposisi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disposisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disposisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'surat' => $surat,
        'users' => $users,
        'keamanan' => $keamanan,
        'kecepatan' => $kecepatan,
    ]) ?>

</div>
