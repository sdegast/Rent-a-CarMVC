<?php

namespace app\models;

use app\core\CarModel;

class Car extends CarModel
{
    private int $id;
    private string $carname = '';
    private int $cardailyprice;
    private int $carseats;
    private string $carcurrentowner;
    private string $carimg;

    public function __construct($id, $carname, $cardailyprice, $carseats, $carcurrentowner, $carimg)
    {
        $this->id = $id;
        $this->carname = $carname;
        $this->cardailyprice = $cardailyprice;
        $this->carseats = $carseats;
        $this->carcurrentowner = $carcurrentowner;
        $this->carimg = $carimg;
    }

    public function getCarName(): string
    {
        return $this->carname;
    }

    public function getCarSeats(): int
    {
        return $this->carseats;
    }

    public function getCarId(): int
    {
        return $this->id;
    }

    public function getCarImg(): string{
        return $this->carimg;
    }

    public function getCurrentOwner(): string
    {
        return $this->carcurrentowner;
    }

    public function getPrice(): int
    {
        return $this->cardailyprice;
    }
}