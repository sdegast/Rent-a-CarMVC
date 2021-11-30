<?php

namespace app\models;

use app\core\UserModel;
use JetBrains\PhpStorm\ArrayShape;

abstract class UserStatus {
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
}

class User extends UserModel
{
    public string $email = '';
    public int $status = UserStatus::STATUS_INACTIVE;
    public string $password = '';
    public int $role;
    public string $passwordRepeat = '';

    public static function tableName(): string
    {
        return 'user';
    }

    public function save(): bool
    {
        $this->status = UserStatus::STATUS_INACTIVE;
        $this->password = password_hash($this->password,  PASSWORD_DEFAULT);
        return parent::save();
    }

    #[ArrayShape(['email' => "array", 'password' => "array", 'passwordRepeat' => "array"])] public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwordRepeat' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function attributes(): array
    {
        return ['email', 'password', 'status', 'role'];
    }

    #[ArrayShape(['email' => "string", 'password' => "string", 'passwordRepeat' => "string"])] public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Wachtwoord',
            'passwordRepeat' => 'Wachtwoord bevestigen'
        ];
    }

    public function getDisplayName(): string
    {
        return $this->email;
    }

    public function getRole(): int
    {
        return $this->role;
    }
}