<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08/03/18
 * Time: 03:35
 */

namespace App\Repositories;


use App\Models\Client\Client;

class ClientsRepository extends Repository
{
    public function model()
    {
        return Client::class;
    }
}