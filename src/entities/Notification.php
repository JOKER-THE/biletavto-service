<?php

namespace application\entities;

use yii\db\ActiveRecord;

/**
 * Уведомления для маршрутов. Например:
 * "Автобус отправляется только по наполнению".
 *
 * Сущность Notification ссылается на миграцию route-notification
 * из сервиса поиска рейсов Biletavto-Search.
 *
 * @property integer $id
 * @property string  $cityStart
 * @property string  $cityEnd
 * @property string  $notification
 * @property boolean $active
 */
class Notification extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route_notification}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_start', 'city_end', 'notification', 'active'], 'required'],
            [['city_start', 'city_end', 'notification'], 'string'],
            [['active'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_start' => 'Город отправления',
            'city_end' => 'Город прибытия',
            'notification' => 'Уведомление',
            'active' => 'Active'
        ];
    }
}
