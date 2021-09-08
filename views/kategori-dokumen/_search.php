<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriDokumenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-dokumen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class'=>'form-inline']
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>

    <?php ActiveForm::end(); ?>

</div>
