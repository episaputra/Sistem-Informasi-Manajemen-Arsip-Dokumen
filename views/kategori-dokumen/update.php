<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriDokumen */

$this->title = Yii::t('app', 'Update {modelClass} : ', [
    'modelClass' => 'Kategori Dokumen',
]) . ' ' . $model->kode_kategori;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_kategori, 'url' => ['view', 'id' => $model->kode_kategori]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kategori-dokumen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
