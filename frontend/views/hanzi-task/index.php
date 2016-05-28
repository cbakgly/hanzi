<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\HanziTask;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Hanzi Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanzi-task-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?php if (\common\models\HanziTask::isLeader(Yii::$app->user->id))
            Html::a(Yii::t('frontend', 'Create Hanzi Task'), ['create'], ['class' => 'btn btn-success']) 
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                "headerOptions" => ["width" => "30"]
            ],
            [                     
            'attribute' => 'user_id',
            'value' => function ($data) {
                return User::findIdentity($data['user_id'])->username; 
                },
            'filter'=>HanziTask::seqs(),
            ],
            [                     
            'attribute' => 'leader_id',
            'value' => function ($data) {
                return User::findIdentity($data['leader_id'])->username; 
                },
            ],
            [                     
            'attribute' => 'seq',
            'value' => function ($data) {
                return $data->seqs()[$data['seq']]; 
                },
            'filter'=>HanziTask::seqs(),
            ],
            [                     
            'attribute' => 'page',
            'value' => function ($data) {
                return Html::a($data['page'],  yii\helpers\Url::to(['hanzi-split/index', 'page' => 2], true));
                },
            'format' => 'raw',
            ],
            'start_id',
            'end_id',
            [                     
            'attribute' => 'status',
            'value' => function ($data) {
                return $data->statuses()[$data['status']]; 
                },
            'filter'=>HanziTask::statuses(),
            ],
            // 'remark',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                "headerOptions" => ["width" => "100"]
            ],
        ],
    ]); ?>
</div>
