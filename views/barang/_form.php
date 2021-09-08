<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_jenis_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seri_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_barang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
