<?php

namespace App\SearchEngine;

/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/03/18
 * Time: 20:21
 */
class BaseSearchEngine
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = array_filter($data, function($value) {
           return $value !== '';
        });
    }




}