<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = Yii::t('app', 'Update {modelClass} : ', [
    'modelClass' => 'Pegawai',
]) . ' ' . $model->nip;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawai'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip, 'url' => ['view', 'id' => $model->nip]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fotomodel' => $fotomodel,
    ]) ?>

</div>
