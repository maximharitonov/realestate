<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08/03/18
 * Time: 03:50
 */

namespace App\Repositories;


use App\Models\Asset\AssetInfo;

class AssetInfoRepository extends Repository
{

    public function model()
    {
        return AssetInfo::class;
    }
}