<?php 

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

namespace app\models;
use ho_b7\phpmvc\Application;
use ho_b7\phpmvc\Model;

/**
 * Class LoginForm
 * 
 * @author houdaifa <boucena214@gmail.com>
 * @package app\models;
*/

class LoginForm extends Model
{
    public string $email = '';

    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user) {
            $this->addError('email', 'Invalid Email Address');
            return false;
        }

        if(!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Invalid Password');
            return false;
        }

        return Application::$app->login($user);
    }

}