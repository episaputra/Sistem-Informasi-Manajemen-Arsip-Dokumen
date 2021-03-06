<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPengadaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-pengadaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_jenis_pengadaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis_pengadaan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
