<?php

namespace application\entities;

use yii\db\ActiveRecord;

/**
 * Статичные рейсы. В это значение входит список рейсов,
 * которые в любом случае должны отдавать 200 ОК, не зависимо
 * от их доступности для онлайн продаж.
 *
 * Сущность RouteStatic ссылается на миграцию route-static
 * из сервиса поиска рейсов Biletavto-Search.
 *
 * @property integer $id
 * @property string  $departure
 * @property string  $arrival
 * @property integer $status
 */
class RouteStatic extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route_static}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure', 'arrival', 'status'], 'required'],
            [['departure', 'arrival'], 'string'],
            [['status'], 'integer'],
        ];
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
            'status' => 'Ответ'
        ];
    }
}
