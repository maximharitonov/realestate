<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetInfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'asset_id',
        'region',
        'city',
        'neighborhood',
        'street',
        'size',
        'price',
        'floor',
        'rooms',
        'elevator',
        'garden',
        'parking',
        'renovated',
        'animals_allowed',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function asset()
    {
        $this->belongsTo(Asset::class);
    }
}
