<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = $model->kode_perusahaan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perusahaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->kode_perusahaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->kode_perusahaan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_perusahaan',
            'nama_perusahaan',
            'alamat_perusahaan',
        ],
    ]) ?>

</div>
