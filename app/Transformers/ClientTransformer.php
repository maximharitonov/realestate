<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/02/18
 * Time: 13:00
 */
namespace App\Transformers;


class ClientTransformer extends Transformer
{

    public static function transform($client)
    {
        return [
            'id'            =>  (int)    $client->id,
            'name'          =>  (string) $client->name,
            'phone'         =>  (string) $client->phone,
            'email'         =>  (string) $client->email,
            'created_at'    =>  (string) $client->created_at,
            'updated_at'    =>  (string) $client->email
        ];
    }

    public static function extract($client)
    {
        return array_merge(
            self::transform($client), [
                'specs' => $client->specs->each(function ($spec) {
                    return [
                        'id'                =>  (int)     $spec->id,
                        'asset_type'        =>  (int)     $spec->asset_type,
                        'purpose_id'        =>  (int)     $spec->purpose_id,
                        'region'            =>  (string)  $spec->region,
                        'city'              =>  (string)  $spec->city,
                        'neighborhood'      =>  (string)  $spec->neighborhood,
                        'street'            =>  (string)  $spec->street,
                        'size'              =>  (int)     $spec->size,
                        'price'             =>  (int)     $spec->price,
                        'floor'             =>  (int)     $spec->floor,
                        'rooms'             =>  (double)  $spec->rooms,
                        'elevator'          =>  (bool)    $spec->elevator,
                        'garden'            =>  (bool)    $spec->garden,
                        'parking'           =>  (bool)    $spec->parking,
                        'renovated'         =>  (bool)    $spec->renovated,
                        'animals_allowed'   =>  (bool)    $spec->animals_allowed,
                        'created_at'        =>  (string)  $spec->created_at,
                        'updated_at'        =>  (string)  $spec->updated_at,
                    ];
                }, $client->specs)
            ]
        );
    }

}