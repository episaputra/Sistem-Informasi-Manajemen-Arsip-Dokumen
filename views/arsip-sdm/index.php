<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use fedemotta\datatables\DataTables;
use app\models\ArsipSdmSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSdmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Arsip Dokumen');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js',['depends'=>[yii\web\JqueryAsset::className()]]);
$this->registerJsFile('//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js',['depends'=>[yii\web\JqueryAsset::className()]]);
$this->registerJs("
    $(document).ready(function(){
        $('#arsip').DataTable();
    });
    ",yii\web\View::POS_END);
$this->registerCss("#arsip_filter, #arsip_paginate{text-align:right;}");
?>
<div class="arsip-sdm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php 

        if(Yii::$app->user->identity->user_level=='Super Admin' or Yii::$app->user->identity->user_level=='Admin SDM'){
            echo Html::a(Yii::t('app', 'Tambah'), ['create'], ['class' => 'btn btn-success']);
        }

        /*if(Yii::$app->user->identity->user_level=='Admin SDM'){
            echo Html::a(Yii::t('app', 'Tambah'), ['create'], ['class' => 'btn btn-success']);
        }*/

        ?>
    </p>
    <br>

    <table id="arsip" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">NIP</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jumlah Dokumen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($models as $data): ?>
            <tr>
                <td><?= $data["nip"] ?></td>
                <td><?= $data["nama"] ?></td>
                <td align = "center"><?= $data["jumlah"] ?></td>
                <td width = "200 px" align = "center"><a class = "btn btn-success" href = "./?r=arsip-sdm/detail&id=<?= $data['nip'] ?>">Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
