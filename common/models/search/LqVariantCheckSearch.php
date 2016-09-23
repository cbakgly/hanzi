<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LqVariantCheck;

/**
 * LqVariantCheckSearch represents the model behind the search form about `common\models\LqVariantCheck`.
 */
class LqVariantCheckSearch extends LqVariantCheck
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'source', 'frequency', 'nor_var_type', 'level', 'bconfirm', 'created_at', 'updated_at'], 'integer'],
            [['pic_name', 'variant_code', 'origin_standard_word_code', 'belong_standard_word_code', 'remark'], 'safe'],
            [['user.username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @param boolean $levelNull. if $levelNull is true, then search models which level is null
     * @return ActiveDataProvider
     */
    public function search($params, $levelNull=false)
    {
        $query = LqVariantCheck::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);


        // 并设置表别名为 `user`
        $query->joinWith(['user' => function ($query) {
            $query->from(['user' => 'user']);
        }]);
        // 使关联列的排序生效
        $dataProvider->sort->attributes['user.username'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        if(!empty($this->frequency)) {
            if(is_int($this->frequency)) {
                $query->andFilterWhere(['frequency' => $this->frequency]);
            } elseif(preg_match('/^([><]=?)(\d+)/', $this->frequency, $matches)) {
                $query->andFilterWhere([$matches[1], 'frequency', $matches[2]]);
            }
        }

        if ($levelNull) {
            $query->andWhere('level is null');
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'source' => $this->source,
            'nor_var_type' => $this->nor_var_type,
            'level' => $this->level,
            'bconfirm' => $this->bconfirm,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pic_name', $this->pic_name])
            ->andFilterWhere(['like', 'variant_code', $this->variant_code])
            ->andFilterWhere(['bconfirm' => $this->bconfirm])
            ->andFilterWhere(['like', 'origin_standard_word_code', $this->belong_standard_word_code])
            ->andFilterWhere(['like', 'belong_standard_word_code', $this->belong_standard_word_code])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        $query->andFilterWhere(['like', 'user.username', $this->getAttribute('user.username')]);

        return $dataProvider;
    }
}
