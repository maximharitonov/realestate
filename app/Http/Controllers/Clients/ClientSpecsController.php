<?php

namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use App\Repositories\ClientSpecsRepository;

class ClientSpecsController extends Controller
{
    protected $rules = [
        'data.client_id'    =>  'required|numeric',
        'data.asset_type'   =>  'required|numeric',
        'data.purpose_id'   =>  'required|numeric'
    ];

    public function __construct(){
        $this->repository = ClientSpecsRepository::class;
    }
}
