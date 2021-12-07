<?php

namespace app\core;

use app\core\db\DbModel;

class ReserveringModel extends DbModel
{
    public static function tableName(): string
    {
        return 'reservering';
    }

}