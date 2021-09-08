<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipSdm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-sdm-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=
        $form->field($model, 'nip')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\app\models\Pegawai::find()->asArray()->all(), 'nip', function($model) {
                return $model['nip'].' - '.$model['nama'];
            }),
            'options' => ['placeholder' => 'Pilih NIP atau Nama Pegawai'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'kode_kategori')->dropDownList(ArrayHelper::map($kode_kategori, 'kode_kategori', 'nama_kategori')) ?>

    <?= $form->field($model, 'no_dokumen')->textInput(['maxlength' => true], ['enableAjaxValidation' => true]) ?>

    <?= $form->field($model, 'nama_dokumen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 3]) ?>

    <?= $form->field($filemodel, 'filedokumen')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
