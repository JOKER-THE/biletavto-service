<?php

namespace application\services;

use Yii;
use application\entities\Manager;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * IdentityService - сервис аутентификации.
 *
 * @property Manager|null $user
 */
class IdentityService implements IdentityInterface
{
    private $user;

    /**
     * Инициализация менеджера через конструктор.
     *
     * @param Manager $user объект пользователя
     */
    public function __construct(Manager $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user =  Manager::findOne(['id' => $id]);

        return $user ? new self($user): null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->user->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): string
    {
        return $this->user->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Получение свойств.
     *
     * @param $string name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->user->$name;
    }

    /**
     * Вызов методов.
     *
     * @param string $methodName название метода
     * @param $args аргументы
     *
     * @return mixed
     */
    public function __call($methodName, $args)
    {
        return $this->user->$methodName($args);
    }
}
