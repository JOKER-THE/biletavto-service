<?php

namespace application\entities;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Модель менеджера проекта. Менеджеры - все сотрудники,
 * работающие в системе.
 *
 * @property integer $id
 * @property string  $login
 * @property string  $password_hash
 * @property string  $password_reset_token
 * @property string  $email
 * @property string  $name
 * @property string  $surname
 * @property string  $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string  $password
 */
class Manager extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%managers}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * Поиск пользователя по логину.
     *
     * @param string $login логин пользователя
     *
     * @return static|null
     */
    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Валидация пароля.
     *
     * @param string $password валидируемый пароль
     *
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Создает хеш пароля из $password и устанавливает его в модель.
     *
     * @param string $password пароль пользователя
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Создает ключ аутентификации для "запомнить меня"
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
