<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Repositories\AssetsRepository;
use App\Transformers\AssetTransformer;

class AssetsController extends Controller
{
    protected $rules = [
        'data.owner_id'     =>  'required|numeric',
        'data.asset_type'   =>  'required|numeric',
        'data.referrer_id'  =>  'required|numeric',
    ];

    public function __construct(){
        $this->repository = AssetsRepository::class;
        $this->transformer = AssetTransformer::class;
    }
}
