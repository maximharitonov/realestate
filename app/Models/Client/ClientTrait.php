<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/02/18
 * Time: 00:11
 */

namespace App\Models\Client;


trait ClientTrait
{
    public function getNameAttribute()
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }



}