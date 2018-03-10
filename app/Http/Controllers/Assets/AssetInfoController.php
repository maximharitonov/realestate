<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Repositories\AssetInfoRepository;

class AssetInfoController extends Controller
{
    protected $rules = [
        'data.city'             =>  'required',
        'data.street'           =>  'required',
        'data.street_num'       =>  'required|numeric|min:0',
        'data.apartment_num'    =>  'numeric|min:0',
        'data.size'             =>  'required|numeric|min:0',
        'data.price'            =>  'required|numeric|min:0',
        'data.floor'            =>  'required|numeric|min:0',
        'data.rooms'            =>  'required|numeric|min:0',
        'data.elevator'         =>  'required|boolean',
        'data.garden'           =>  'required|boolean',
        'data.parking'          =>  'required|boolean',
        'data.renovated'        =>  'required|boolean',
    ];

    public function __construct(){
        $this->repository = AssetInfoRepository::class;
    }
}
