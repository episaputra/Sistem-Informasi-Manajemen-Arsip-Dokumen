<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisPengadaan */

$this->title = Yii::t('app', 'Create Jenis Pengadaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Pengadaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pengadaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
