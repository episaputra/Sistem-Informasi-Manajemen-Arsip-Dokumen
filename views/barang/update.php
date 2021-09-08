<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Barang',
]) . $model->kode_barang;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Barangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_barang, 'url' => ['view', 'id' => $model->kode_barang]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
