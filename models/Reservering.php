<?php

namespace app\models;

use app\core\Application;
use app\core\ReserveringModel;
use JetBrains\PhpStorm\ArrayShape;

class Reservering extends ReserveringModel
{
    public string $startdatum;
    public string $einddatum;
    public string $userid;
    public int $carid;

    public function save(): bool
    {
        $this->userid = Application::$app->user->getUserId();
        return parent::save();
    }

    public function attributes(): array
    {
        return ['startdatum', 'einddatum', 'userid', 'carid'];
    }

    #[ArrayShape(['startdatum' => "array"])] public function rules(): array
    {
        return [
            'startdatum' => [self::RULE_AFTER_TODAY, self::RULE_REQUIRED]
        ];
    }

    public function dateCheck($startdatum, $einddatum): bool
    {
        return round((strToTime($einddatum) - strToTime($startdatum)) / (60 * 60 * 24)) >= 0;
    }

    public function __construct($startdatum, $einddatum, $userid, $carid)
    {
        $this->startdatum = $startdatum;
        $this->einddatum = $einddatum;
        $this->userid = $userid;
        $this->carid = $carid;
    }

    public function getUserId(): int
    {
        return $this->userid;
    }

    public function getCarId(): int
    {
        return $this->carid;
    }

    public function getStartDatum(): string
    {
        return $this->startdatum;
    }

    public function getEindDatum(): string
    {
        return $this->einddatum;
    }

    public function getUsername(): string
    {
        return Application::$app->getUsername($this->getUserId());
    }
}