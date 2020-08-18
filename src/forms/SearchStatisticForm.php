<?php

namespace application\forms;

use Yii;
use yii\base\Model;

/**
 * SearchStatisticForm - это модель, лежащая в основе формы выгрузки
 * статистики поиска маршрутов.
 *
 * @property SearchStatistic|null
 */
class SearchStatisticForm extends Model
{
    public $dateIntervalStart;
    public $dateIntervalEnd;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateIntervalStart', 'dateIntervalEnd'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dateIntervalStart' => 'От какого времени искать?',
            'dateIntervalEnd' => 'До какого времени искать?'
        ];
    }
}
