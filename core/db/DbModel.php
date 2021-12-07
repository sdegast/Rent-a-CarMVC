<?php

namespace app\core\db;

use app\core\Application;
use app\core\Model;
use app\core\db\Database;
use app\models\Car;
use app\models\Reservering;
use PDO;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;
    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function findAllCars(): bool|array
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        $t = $statement->fetchAll(PDO::FETCH_OBJ);
        $cars = [];
        foreach ($t as $key => $item) {
            $newCar = new Car($item->id, $item->carname,
                $item->cardailyprice, $item->carseats, $item->carimg);
            array_push($cars, $newCar);
        }
        return $cars;
    }

    public static function findAllReserved(): bool|array
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName ORDER BY startdatum");
        $statement->execute();
        $t = $statement->fetchAll(PDO::FETCH_OBJ);
        $reserveringen = [];
        foreach ($t as $key => $item) {
            $newReservering = new Reservering($item->startdatum,
                $item->einddatum, $item->userid, $item->carid);
            array_push($reserveringen, $newReservering);
        }
        return $reserveringen;
    }

    public static function updateOne($attributes, $values, $id): bool
    {
        $tableName = static::tableName();
        $updatedAttr = [];
        foreach ($attributes as $key => $value) {
            array_push($updatedAttr, $value . '=' . $values[$key]);
        }
        $sql = implode(', ', $updatedAttr);
        $statement = self::prepare("UPDATE $tableName SET $sql WHERE id = $id");
        $statement->execute();
        return true;
    }
}