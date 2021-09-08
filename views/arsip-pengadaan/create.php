<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsipPengadaan */

$this->title = Yii::t('app', 'Create Arsip Pengadaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Pengadaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-pengadaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
