<?php

namespace application\forms\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use application\entities\Blacklist;

/**
 * BlacklistForm - это форма фильтра поиска рейсов
 * из черного списка.
 *
 * @property Blacklist $query
 */
class BlacklistForm extends Blacklist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['city_start', 'city_end', 'route_name', 'date', 'time', 'agent'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Функция поиска по параметрам.
     *
     * @param array $params
     *
     * @return object yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = Blacklist::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'city_start', $this->city_start])
              ->andFilterWhere(['like', 'city_end', $this->city_end])
              ->andFilterWhere(['like', 'route_name', $this->route_name])
              ->andFilterWhere(['like', 'date', $this->date])
              ->andFilterWhere(['like', 'time', $this->time])
              ->andFilterWhere(['like', 'id_agent', $this->agent]);

        return $dataProvider;
    }
}
