<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriDokumen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-dokumen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
