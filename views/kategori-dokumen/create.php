<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KategoriDokumen */

$this->title = Yii::t('app', 'Tambah Kategori Dokumen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-dokumen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
