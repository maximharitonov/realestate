<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\API\AuthorizedController;
use App\Models\Asset\Asset;
use App\Transformers\AssetTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response as CODE;
use Illuminate\Support\Facades\Response;

class AssetInfoController extends AuthorizedController
{
    private $policies = [
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

    public function __construct()
    {
        parent::__construct(Asset::class);
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

        $asset     = parent::create($request);

        if ( ! $asset)
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_FORBIDDEN
            ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_CREATED,
            'data'          =>  $this->transformer->transform($asset)
        ]);
    }

    public function update(Request $request)
    {
        $validator  = parent::validate($request, ['data.asset_type' => 'required|numeric']);
        if ($validator && $validator->fails())
            return Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_UNPROCESSABLE_ENTITY,
                'errors'    =>  $validator
            ]);

        $asset             = parent::update($request);

        if ( ! $asset)return Response::json([
            'success'       =>  false,
            'HTTP_CODE'     =>  CODE::HTTP_FORBIDDEN
        ]);

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK,
            'data'          =>  $this->transformer->transform($asset)
        ]);
    }


    public function delete(Request $request)
    {
        return parent::delete($request) ?
            Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK
            ]) : Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_INTERNAL_SERVER_ERROR]);

    }
}
