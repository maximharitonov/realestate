<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/02/18
 * Time: 13:00
 */
namespace App\Transformers;

abstract class Transformer
{
    abstract static public function transform($item);

    abstract static public function extract($item);

    public static function transformCollection($items)
    {
        return $items->each(function($item) {
            return self::transform($item);
        });
    }
}