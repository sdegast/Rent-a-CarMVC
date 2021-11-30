<?php

namespace app\core\form;

use app\core\Model;
use JetBrains\PhpStorm\Pure;

class Form
{
    public static function begin($action, $method, $options = []): Form
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" class="p-4 p-md-5 border rounded-3 bg-light" method="%s" %s>', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    #[Pure] public function field(Model $model, $attribute): Field
    {
        return new Field($model, $attribute);
    }

}