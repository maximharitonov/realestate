<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/02/18
 * Time: 13:00
 */
namespace App\Transformers;


class AssetTransformer extends Transformer
{

    public function transform($asset)
    {
        return [
            'id'            =>  (int) $asset->id,
            'asset_type'    =>  (int) $asset->asset_type,
            'created_at'    =>  (string) $asset->first_name,
            'updated_at'    =>  (string) $asset->last_name,
        ];
    }

    public function extract($asset)
    {
        return array_merge(
            $this->transform($asset), [
                'info'     =>  $asset->info->map(function ($info) {
                    return [
                        'id'                =>  (int)     $info->id,
                        'region'            =>  (string)  $info->region,
                        'city'              =>  (string)  $info->city,
                        'neighborhood'      =>  (string)  $info->neighborhood,
                        'street'            =>  (string)  $info->street,
                        'size'              =>  (int)     $info->size,
                        'price'             =>  (int)     $info->price,
                        'floor'             =>  (int)     $info->floor,
                        'rooms'             =>  (double)  $info->rooms,
                        'elevator'          =>  (boolean) $info->elevator,
                        'garden'            =>  (boolean) $info->garden,
                        'parking'           =>  (boolean) $info->parking,
                        'renovated'         =>  (boolean) $info->renovated,
                        'animals_allowed'   =>  (boolean) $info->animals_allowed,
                        'created_at'        =>  (string)  $info->created_at,
                        'updated_at'        =>  (string)  $info->updated_at,
                    ];
                }, $asset->info)
            ]
        );
    }
}