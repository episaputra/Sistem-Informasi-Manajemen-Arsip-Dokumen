<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipSdm */

$this->title = $model->no_dokumen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-sdm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
        if(Yii::$app->user->identity->user_level=='Super Admin' or Yii::$app->user->identity->user_level=='Admin SDM'){
            echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->no_dokumen], ['class' => 'btn btn-primary']);
            echo " ";
            echo Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->no_dokumen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Anda yakin menghapus data ini?'),
                'method' => 'post',
                ],
            ]);
        }
         ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'namaPegawai',
            'namaKategori',
            'no_dokumen',
            'nama_dokumen',
            'keterangan:ntext',
            'file:ntext',
            /*[
                'attribute' => 'file',
                'format' => 'html',
                'value' => function($data){
                    return Html::a('file','../dokumen/'.$data['file']);
                },
            ],*/
        ],
    ]) ?>

    <?= \yii2assets\pdfjs\PdfJs::widget(['url'=>'../dokumen/'.$model->file]); ?>

</div>
