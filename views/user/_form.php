<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

//<?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true])
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_level')->dropDownList([ 'Super Admin' => 'Super Admin', 'Admin' => 'Admin', 'Admin SDM' => 'Admin BP', 'Pegawai SDM' => 'Pegawai BP', 'Admin Pengadaan' => 'Admin Pengadaan', 'Pegawai Pengadaan' => 'Pegawai Pengadaan', 'Supervisor Pengadaan' => 'Supervisor Pengadaan', 'Admin Sekum' => 'Admin Sekum', 'Supervisor SDM dan Umum' => 'Supervisor SDM dan Umum', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
