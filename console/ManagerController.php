<?php

namespace app\console;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use application\entities\Manager;

/**
 * Регистрация пользователей через консоль.
 */
class ManagerController extends Controller
{
    /**
     * Добавление нового аккаунта.
     *
     * @return int Exit code
     */
    public function actionAddManager($login, $password, $email, $name, $surname)
    {
        $manager = Manager::find()->where(['login' => $login])->one();

        if (empty($manager)) {
            $user = new Manager();
            $user->login = $login;
            $user->email = $email;
            $user->name = $name;
            $user->surname = $surname;
            $user->setPassword($password);
            $user->generateAuthKey();
            
            if ($user->save()) {
                return ExitCode::OK;
            }
        }
    }
}
