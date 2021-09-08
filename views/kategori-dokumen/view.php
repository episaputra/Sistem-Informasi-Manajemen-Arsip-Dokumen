<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriDokumen */

$this->title = $model->kode_kategori;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-dokumen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->kode_kategori], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->kode_kategori], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Anda yakin menghapus data ini?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_kategori',
            'nama_kategori',
        ],
    ]) ?>

</div>
