<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\API\AuthorizedController;
use App\Models\Asset\Asset;
use App\Transformers\AssetTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response as CODE;
use Illuminate\Support\Facades\Response;

class AssetsController extends AuthorizedController
{
    private $transformer;
    private $policies = [
        'data.owner_id'     =>  'required',
        'data.asset_type'   =>  'required',
    ];

    public function __construct()
    {
        parent::__construct(Asset::class);
        $this->transformer  =   new AssetTransformer();
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
        $asset             =   parent::get($request);

        if ( ! $asset) {
            return Response::json([
                'success'       =>  false,
                'HTTP_CODE'     =>  CODE::HTTP_NOT_FOUND,
            ]);
        }

        return Response::json([
            'success'       =>  true,
            'HTTP_CODE'     =>  CODE::HTTP_OK,
            'data'          =>  $this->transformer->transform($asset)
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

        $asset              = parent::create($request);

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
            ]) :
            Response::json([
                'success'   =>  false,
                'HTTP_CODE' =>  CODE::HTTP_INTERNAL_SERVER_ERROR
            ]);

    }
}
