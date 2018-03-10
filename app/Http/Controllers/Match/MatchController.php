<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use App\Repositories\MatchesRepository;

class MatchController extends Controller
{
    protected $rules = [
        'data.asset_id'             =>  'required|numeric',
        'data.specs_id'             =>  'required|numeric',
        'data.user_id'              =>  'required|numeric',
        'data.private_match'        =>  'required|boolean',
    ];

    public function __construct()
    {
        $this->repository = MatchesRepository::class;
    }


}
