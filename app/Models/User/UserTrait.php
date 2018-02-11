<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/02/18
 * Time: 23:54
 */

namespace App\Models\User;


trait UserTrait
{
    public function getClientsIdsAttribute()
    {
        return $this->clients->map(function($client) {
           return $client->id;
        });
    }

    public function getAssetsIdsAttribute()
    {
        return $this->assets->map(function($asset) {
           return $asset->id;
        });
    }
}