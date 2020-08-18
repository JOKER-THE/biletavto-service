<?php

namespace application\entities;

use yii\db\ActiveRecord;

/**
 * Черный список рейсов.
 * Используется для того, чтобы ограничить выдачу определенных
 * маршрутов, как в самой системе, так и от партнеров-перевозчиков.
 *
 * Работает по принципу указания ключей, по которым исключается рейс.
 * Т.е. если нужно отключить, например, целиком маршрут из Улан-Удэ до
 * Иркутска, то следует указать только route_name, id_agent и agent.
 * Если нужно отрубить все направления АВО на 19.01.2020, то необходимо
 * указать поля date, id_agent, agent
 * Отключить промежуточную станцию конкретного маршрута можно, указав
 * city_start, city_end, route_name, id_agent и agent. И т.д.
 *
 * Важно, т.к. маршруты имеют различный формат наименования, перед занесением его
 * в черный список, следует скопировать точное наименование из поиска Biletavto-Search
 *
 * Сущность Blacklist ссылается на миграцию route-blacklist
 * из сервиса API Biletavto-Api.
 *
 * @property integer  $id
 * @property string   $cityStart
 * @property string   $cityEnd
 * @property string   $date
 * @property string   $time
 * @property integer  $weekDay
 * @property integer  $idAgent
 * @property string   $agent
 */
class Blacklist extends ActiveRecord
{
    /**
     * Идентификаторы и названия перевозчиков.
     * Соответствуют тем же значениям, что и
     * в сервисах Biletavto-Search и Biletavto-Api
     */
    const BILETAVTO_ID = 0;
    const AVTOVOKZAL_ONLINE_ID = 1;
    const UNITIKI_ID = 2;
    const BILETAVTO = 'Biletavto';
    const AVTOVOKZAL_ONLINE = 'AvtovokzalOnline';
    const UNITIKI = 'Unitiki';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route_blacklist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agent', 'agent'], 'required'],
            [['city_start', 'city_end', 'route_name', 'date', 'time', 'agent'], 'string'],
            [['week_day', 'id_agent'], 'integer']
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
            'route_name' => 'Маршрут',
            'date' => 'Дата отправления',
            'time' => 'Время отправления',
            'week_day' => 'День недели',
            'id_agent' => 'Сервис перевозок',
            'agent' => 'Сервис перевозок'
        ];
    }

    /**
     * Получение имени сервиса перевозок по его ID.
     *
     * @param integer $id
     *
     * @return string
     */
    public function getAgent($id)
    {
        switch ($id) {
            case self::BILETAVTO_ID:
                $name = self::BILETAVTO;
                break;
            case self::AVTOVOKZAL_ONLINE_ID:
                $name = self::AVTOVOKZAL_ONLINE;
                break;
            case self::UNITIKI_ID:
                $name = self::UNITIKI_ID;
                break;
        }

        return $name;
    }
}
