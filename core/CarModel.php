<?php

namespace app\core;

use app\core\db\DbModel;

class CarModel extends DbModel
{

    public static function tableName(): string
    {
        return 'car';
    }
}