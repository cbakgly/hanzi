<?php

use common\models\HanziImage;
use common\models\Hanzi;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hanzi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Hanzis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanzi-view">
    <div class="col-lg-offset-1 col-lg-10">
    
    <label>基本信息</label>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'source',
                'value' =>  empty($model->source) ? '' : Hanzi::sources()[$model->source],
            ],
            'word',
            [
                'attribute' => 'picture',
                'value'=> \common\models\HanziSet::getPicturePath($model->source, $model->picture),
                'format' => ['image',['width'=>'30','height'=>'30']]
            ],
            [
                'attribute' => 'nor_var_type',
                'value' => empty($model->nor_var_type) ? '' : Hanzi::norVarTypes()[$model->nor_var_type],
            ],
            'standard_word',
            'position_code',
            'radical',
            'stocks',
            // 'structure',
            // [
            //     'attribute' => 'hard10',
            //     'value' => empty($model->hard10) ? '' : Hanzi::hards()[$model->hard10],
            // ],
            // 'initial_split11',
            // 'initial_split12',
            // 'deform_split10',
            // 'similar_stock10',
            // [
            //     'attribute' => 'hard20',
            //     'value' => empty($model->hard20) ? '' : Hanzi::hards()[$model->hard20],
            // ],
            // 'initial_split21',
            // 'initial_split22',
            // 'deform_split20',
            // 'similar_stock20',
            // [
            //     'attribute' => 'hard30',
            //     'value' => empty($model->hard30) ? '' : Hanzi::hards()[$model->hard30],
            // ],
            // 'initial_split31',
            // 'initial_split32',
            // 'deform_split30',
            // 'similar_stock30',
            'remark',
            // [                      
            // 'attribute' => 'created_at',
            // 'format'=>['datetime','php:Y-m-d H:i:s'],
            // ],
            // [                      
            // 'attribute' => 'updated_at',
            // 'format'=>['datetime','php:Y-m-d H:i:s'],
            // ],
        ],
    ]) ?>

    <label>拆分信息</label>
    <?php echo $this->render('_splitTable2', [
        'model' => $model,
    ]) ?>

    </div>

</div>
