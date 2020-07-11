<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keamanan */

$this->title = 'Create Keamanan';
$this->params['breadcrumbs'][] = ['label' => 'Keamanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keamanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
