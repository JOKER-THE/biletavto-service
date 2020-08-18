<?php

namespace application\forms\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use application\entities\Notification;

/**
 * NotificationForm - это форма фильтра поиска
 * уведомлений для маршрутов.
 *
 * @property Notification $query
 */
class NotificationForm extends Notification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['city_start', 'city_end', 'notification'], 'safe']
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
        $query = Notification::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'city_start', $this->city_start])
              ->andFilterWhere(['like', 'city_end', $this->city_end])
              ->andFilterWhere(['like', 'notification', $this->notification]);

        return $dataProvider;
    }
}
