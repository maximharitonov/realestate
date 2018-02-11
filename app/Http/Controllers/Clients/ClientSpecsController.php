<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\API\AuthorizedController;
use App\Models\Client\Client;
use App\Transformers\ClientTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response as CODE;
use Illuminate\Support\Facades\Response;

class ClientSpecsController extends AuthorizedController
{
    private $policies = [
        'data.asset_type'   =>  'required',
        'data.purpose_id'   =>  'required'
    ];

    public function __construct()
    {
        parent::__construct(Client::class);
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

        $specs     = parent::create($request);

        if ( ! $specs)
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_FORBIDDEN
            ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_CREATED,
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

        $specs              = parent::update($request);

        if ( ! $specs)return Response::json([
            'success'       =>  false,
            'HTTP_CODE'     =>  CODE::HTTP_FORBIDDEN
        ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK
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
