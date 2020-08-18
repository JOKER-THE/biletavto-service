<?php

namespace application\forms\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use application\entities\RouteStatic;

/**
 * RouteStaticForm - это форма фильтра поиска
 * рейсов, которые всегда должны отдавать 200 ОК.
 *
 * @property RouteStatic $query
 */
class RouteStaticForm extends RouteStatic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['departure', 'arrival', 'status'], 'safe']
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
        $query = RouteStatic::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'departure', $this->departure])
              ->andFilterWhere(['like', 'arrival', $this->arrival])
              ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
