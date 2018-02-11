<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\API\AuthorizedController;
use App\Models\Client\Client;
use App\Transformers\ClientTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response as CODE;
use Illuminate\Support\Facades\Response;

class ClientsController extends AuthorizedController
{
    private $policies = [
        'data.first_name'   =>  'required',
        'data.last_name'    =>  'required',
        'data.phone'        =>  'required|numeric',
        'data.email'        =>  'email'
    ];

    private $transformer;

    public function __construct()
    {
        parent::__construct(Client::class);
        $this->transformer  =   new ClientTransformer();
    }

    public function index(Request $request)
    {
        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK,
            'data'          =>  $this->transformer->transformCollection(parent::index($request))
        ]);
    }

    public function get(Request $request)
    {
        $client             =   parent::get($request);

        if ( ! $client) {
            return Response::json([
                'success'       =>  false,
                'HTTP_CODE'     =>  CODE::HTTP_NOT_FOUND,
            ]);
        }

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK,
            'data'          =>  $this->transformer->extract($client)
        ]);
    }

    public function create(Request $request)
    {
        $validator  = parent::validate($request, $this->policies);

        if ($validator && $validator->fails())
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_UNPROCESSABLE_ENTITY,
                'errors'    =>  $validator
            ]);

        $client     = parent::create($request);

        if ( ! $client)
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_FORBIDDEN
            ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_CREATED,
            'data'          =>  $this->transformer->transform($client)
        ]);
    }

    public function update(Request $request)
    {
        $validator  = parent::validate($request, $this->policies);
        if ($validator && $validator->fails())
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_UNPROCESSABLE_ENTITY,
                'errors'    =>  $validator
            ]);

        $client             = parent::update($request);

        if ( ! $client)return Response::json([
            'success'       =>  false,
            'HTTP_CODE'     =>  CODE::HTTP_FORBIDDEN
        ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK,
            'data'          =>  $this->transformer->transform($client)
        ]);
    }

    public function delete(Request $request)
    {
        return parent::delete($request) ?
            Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK
            ]) : Response::json([
                'success'   =>  true,
                'HTTP_CODE' =>  CODE::HTTP_INTERNAL_SERVER_ERROR]);

    }
}
