<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jenis Barang',
]) . $model->kode_jenis_barang;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Barangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jenis_barang, 'url' => ['view', 'id' => $model->kode_jenis_barang]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jenis-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
