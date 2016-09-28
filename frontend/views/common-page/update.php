<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CommonPage */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Common Page',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Common Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="common-page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
