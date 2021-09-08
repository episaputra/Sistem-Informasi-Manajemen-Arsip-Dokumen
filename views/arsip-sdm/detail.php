<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSdmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Arsip Dokumen');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="arsip-sdm-detail">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'namaPegawai',
        ],
    ]) ?>

<?php Pjax::begin(); ?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'kode_kategori',
                'value' => 'kodeKategori.nama_kategori',
            ],

            //'kodeKategori.nama_kategori',
            //'namaKategori',
            'no_dokumen',
            'nama_dokumen',

            /*[
                'attribute' => 'file',
                'format' => 'html',
                'value' => function($data) { 
                    return \yii2assets\pdfjs\PdfJs::widget(['url'=> Url::base().'../dokumen/'. $data['file']
                    ]);
            ],*/
        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'visible' => (Yii::$app->user->identity->user_level=='Super Admin' or Yii::$app->user->identity->user_level=='Admin SDM'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'visible' => (Yii::$app->user->identity->user_level=='Pegawai SDM'),
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>