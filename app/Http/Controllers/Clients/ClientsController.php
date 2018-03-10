<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Repositories\ClientsRepository;
use App\Transformers\ClientTransformer;

class ClientsController extends Controller
{
    protected $rules = [
        'data.first_name'   =>  'required',
        'data.last_name'    =>  'required',
        'data.phone'        =>  'required|numeric',
        'data.email'        =>  'email',
        'data.referrer_id'  =>  'required',
    ];

    public function __construct(){
        $this->repository = ClientsRepository::class;
        $this->transformer = ClientTransformer::class;
    }
}
