<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 06/03/18
 * Time: 00:06
 */

namespace App\Http\Controllers\Match;


use App\Transformers\AssetTransformer;
use App\Transformers\ClientTransformer;
use App\Transformers\Transformer;

class MatchTransformer extends Transformer
{

    public static function transform($match)
    {
        return [
            'id'                    =>  (int)    $match->id,
            'asset_affiliate_id'    =>  (int)    $match->asset_affiliate_id,
            'client_affiliate_id'   =>  (int)    $match->client_affiliate_id,
            'private_match'         =>  (bool)   $match->private_match,
            'seen'                  =>  (bool)   $match->seen,
            'created_at'            =>  (string) $match->created_at,
            'updated_at'            =>  (string) $match->updated_at
        ];


    }

    public static function extract($match)
    {
        return array_merge(
            self::transform($match), [
                'asset'             =>  AssetTransformer::transform($match->asset),
                'owner'             =>  ClientTransformer::transform($match->asset_owner),
                'client'            =>  ClientTransformer::transform($match->client)
            ]
        );
    }
}