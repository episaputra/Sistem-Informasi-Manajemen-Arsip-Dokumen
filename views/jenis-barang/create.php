<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = Yii::t('app', 'Create Jenis Barang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Barangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
