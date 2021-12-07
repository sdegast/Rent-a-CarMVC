<?php

namespace app\models;

use app\core\CarModel;

class Car extends CarModel
{
    private int $id;
    private string $carname = '';
    private int $cardailyprice;
    private int $carseats;
    private string $carimg;

    public function __construct($id, $carname, $cardailyprice, $carseats, $carimg)
    {
        $this->id = $id;
        $this->carname = $carname;
        $this->cardailyprice = $cardailyprice;
        $this->carseats = $carseats;
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

    public function getPrice(): int
    {
        return $this->cardailyprice;
    }
}