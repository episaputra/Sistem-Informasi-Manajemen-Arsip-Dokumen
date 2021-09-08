<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPengadaan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jenis Pengadaan',
]) . $model->kode_jenis_pengadaan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Pengadaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_jenis_pengadaan, 'url' => ['view', 'id' => $model->kode_jenis_pengadaan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jenis-pengadaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
