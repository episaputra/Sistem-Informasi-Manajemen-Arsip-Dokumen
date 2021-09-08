<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipPengadaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-pengadaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_kontrak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_jenis_pengadaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_kontrak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_perusahaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_RAB')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_nego')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_kontrak')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
