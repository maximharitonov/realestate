<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08/03/18
 * Time: 03:35
 */

namespace App\Repositories;


use App\Models\Asset\Asset;

class AssetsRepository extends Repository
{
    public function model()
    {
        return Asset::class;
    }
}