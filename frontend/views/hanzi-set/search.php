<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use common\models\HanziSetSearch;


/* @var $this yii\web\View */
/* @var $searchModel common\models\hanziSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'hanzi-set');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'hanzi-set'), 'url' => ['search']];
$this->params['breadcrumbs'][] = '部件笔画检字法';

?>

<div class="hanzi-set-ids-index">
    <div class="hanzi-set-ids-form col-sm-6">

        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'method' => 'post',
            'enableClientScript' => false,
            'enableClientValidation' => false
        ]); ?>

        <?= $form->field($hanziSearch, 'param', ['template' => "{input}\n{hint}\n{error}", 'options' => ['class' => 'col-sm-8']])->textInput(['maxlength' => true]) ?> 
        <a target="blank" href="/article/hanzi-search" title="帮助" style="font-size:16px; margin-right:8px; margin-left:-5px; z-index:100">?</a>

        <?= Html::submitButton('检索', ['class' => 'btn btn-primary']) ?> 
        <?= Html::Button('清空', ['class' => 'btn btn-secondary ', 'id' => 'searchIds-clear']) ?>

        <?php ActiveForm::end(); ?>  

        <br/>

        <div>
        <?php 
        $view = '_searchWord';
        if ($hanziSearch->mode == HanziSetSearch::SEARCH_WORD) {
            $view = '_searchWord';
        } elseif ($hanziSearch->mode == HanziSetSearch::SEARCH_VARIANT) {
            $view = '_searchVariant';
        } elseif ($hanziSearch->mode == HanziSetSearch::SEARCH_REVERSE) {
            $view = '_searchReverse';
        }
        echo $this->render($view, [
                'hanziSearch' => $hanziSearch,
                'data' => $data,
                'pagination' => $pagination,
                'message' => $message,
            ]);
        ?>
        </div>

    </div>

    <div class="col-sm-6">
        <?= \common\components\hanziPart\HanziPart::widget() ?>
    </div>

</div>

 <?php
$script = <<<SCRIPT
    $(document).on('click', '.component-item', function() {
        var value = $('#hanzisetsearch-param').val() + $(this).text();
        $('#hanzisetsearch-param').focus();
        $('#hanzisetsearch-param').val(value);
    });
    $(document).on('click', '.component-img', function() {
        var value = $('#hanzisetsearch-param').val() + $(this).attr("alt");
        $('#hanzisetsearch-param').focus();
        $('#hanzisetsearch-param').val(value);
    });
    $(document).on('click', '#searchIds-clear', function() {
        $('#hanzisetsearch-param').val('');
    });
SCRIPT;
$this->registerJs($script, \yii\web\View::POS_END);

