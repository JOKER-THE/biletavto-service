<?php

namespace application\forms;

use Yii;
use yii\base\Model;
use application\entities\Manager;
use application\services\IdentityService;

/**
 * LoginForm - это модель, лежащая в основе формы входа.
 *
 * @property Manager|null $user
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array правила валидации.
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    /**
     * Валидация пароля.
     * Этот метод служит встроенной проверкой пароля.
     *
     * @param string $attribute проверяемые атрибуты
     * @param array $params дополнительные пары имя-значение, указанные в правиле
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect login or password.');
            }
        }
    }

    /**
     * Авторизация пользователя по логину и паролю.
     *
     * @return bool
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(new IdentityService($this->getUser()), $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }

    /**
     * Поиск пользователя по [[login]]
     *
     * @return Manager|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Manager::findByUsername($this->login);
        }

        return $this->_user;
    }
}
