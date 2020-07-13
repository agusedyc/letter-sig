<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disposisi */

$this->title = 'Create Disposisi';
$this->params['breadcrumbs'][] = ['label' => 'Disposisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-view">

    <h1><?= Html::encode('Isi Surat') ?></h1>

    <?= $this->render('_surat', [
        // 'model' => $model,
        'surat' => $surat,
    ]) ?>

</div>

<div class="disposisi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'surat' => $surat,
        'users' => $users,
        'keamanan' => $keamanan,
        'kecepatan' => $kecepatan,
    ]) ?>

</div>
