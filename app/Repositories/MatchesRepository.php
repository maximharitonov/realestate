<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08/03/18
 * Time: 03:53
 */

namespace App\Repositories;


use App\Models\Match\Match;

class MatchesRepository extends Repository
{
    public function model()
    {
        return Match::class;
    }
}