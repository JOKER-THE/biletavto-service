<?php

namespace application\entities;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * Статистика поиска рейсов по промежутку времени поиска, а также ответ сервера
 * на поиск.
 *
 * Сущность SearchStatistic ссылается на миграцию search_statistic
 * из сервиса поиска рейсов Biletavto-Search.
 *
 * @property integer $id
 * @property string  $departure
 * @property string  $arrival
 * @property string  $date
 * @property integer $status
 * @property integer $count
 */
class SearchStatistic extends ActiveRecord
{
    public $count;

    const STATUS_SUCCESS = '200';
    const STATUS_FAIL = '404';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%search_statistic}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departure' => 'Город отправления',
            'arrival' => 'Город прибытия',
            'date' => 'Дата отправления',
            'status' => 'Ответ',
            'updated_at' => 'Время и дата поиска'
        ];
    }

    /**
     * Поиск данных статистики по интервалу даты.
     *
     * @param string  $dateIntervalStart
     * @param string  $dateIntervalEnd
     * @param integer $status
     *
     * @return object yii\data\ActiveDataProvider
     */
    public function searchInterval($dateIntervalStart, $dateIntervalEnd, $status)
    {
        $dateFormatStart = date('Y-m-d 00:00:00', strtotime($dateIntervalStart));
        $dateFormatEnd = date('Y-m-d 23:59:59', strtotime($dateIntervalEnd));

        $query = $this->find()
            ->select([
                'departure',
                'arrival',
                'status',
                'COUNT(id) AS count'
            ])
            ->where(['>=', 'updated_at', $dateFormatStart])
            ->andWhere(['<=', 'updated_at', $dateFormatEnd])
            ->andWhere(['=', 'status', $status])
            ->groupBy('departure, arrival, status')
            ->orderBy(['count' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $dataProvider->pagination = false;

        return $dataProvider;
    }
}
