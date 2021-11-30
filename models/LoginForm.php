<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use JetBrains\PhpStorm\ArrayShape;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    #[ArrayShape(['email' => "array", 'password' => "array"])] public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Wachtwoord'
        ];
    }

    public function login(): bool
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User not found');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
}
