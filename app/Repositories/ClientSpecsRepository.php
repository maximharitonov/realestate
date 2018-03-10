<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08/03/18
 * Time: 03:51
 */

namespace App\Repositories;


use App\Models\Client\ClientSpecs;

class ClientSpecsRepository extends Repository
{
    public function model()
    {
        return ClientSpecs::class;
    }
}