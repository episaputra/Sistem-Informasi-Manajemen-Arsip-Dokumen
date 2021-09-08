<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = Yii::t('app', 'Create Perusahaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perusahaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
