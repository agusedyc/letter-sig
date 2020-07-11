<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kecepatan */

$this->title = 'Create Kecepatan';
$this->params['breadcrumbs'][] = ['label' => 'Kecepatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecepatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
