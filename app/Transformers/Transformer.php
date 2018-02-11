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
    abstract public function transform($item);

    abstract public function extract($item);

    public function transformCollection($items)
    {
        return $items->each(function($item) {
            return $this->transform($item);
        });
    }
}