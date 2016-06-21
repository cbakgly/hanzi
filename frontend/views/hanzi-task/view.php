<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\HanziTask;

/* @var $this yii\web\View */
/* @var $model common\models\HanziTask */

$this->title = $model->id;
$label = HanziTask::types()[$model->task_type];
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', "$label"), 'url' => ['index', 'type' => $model->task_type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanzi-task-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="col-lg-offset-1 col-lg-10">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [                      
            'label' => '姓名',
            'value' => User::findIdentity($model->user_id)->username,
            ],
            [                      
            'label' => '组长',
            'value' => User::findIdentity($model->leader_id)->username,
            ],
            [                      
            'label' => '任务类型',
            'value' => HanziTask::types()[$model->task_type],
            ],
            'page',
            [                      
            'label' => '阶段',
            'value' => HanziTask::seqs()[$model->seq],
            ],
            [                      
            'attribute' => 'start_id',
            'visible' =>  $model->task_type == HanziTask::TYPE_SPLIT,
            ],
            [                      
            'attribute' => 'end_id',
            'visible' =>  $model->task_type == HanziTask::TYPE_SPLIT,
            ],
            [                      
            'label' => '状态',
            'value' => HanziTask::statuses()[$model->status],
            ],
            'remark',
            [                      
            'attribute' => 'created_at',
            'format'=>['datetime','php:Y-m-d H:i:s'],
            ],
            [                      
            'attribute' => 'updated_at',
            'format'=>['datetime','php:Y-m-d H:i:s'],
            ],
        ],
    ]) ?>
    
    </div>
</div>
