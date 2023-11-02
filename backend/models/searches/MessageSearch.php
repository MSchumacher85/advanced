<?php

namespace backend\models\searches;

use backend\models\SourceMessage;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Message;

/**
 * MessageSearch represents the model behind the search form of `backend\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * {@inheritdoc}
     */

    public $message;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['message'], 'string'],
            [['language', 'translation'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Message::find()->innerJoinWith('source')->onCondition([SourceMessage::tableName().'.category' => 'frontend']);

        $query = Message::find()->joinWith('source');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'translation', $this->translation])
            ->andFilterWhere(['like', 'message', $this->message]);//Todo

        return $dataProvider;
    }
}
