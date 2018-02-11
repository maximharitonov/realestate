<?php

namespace App\Models\Asset;

use App\Scopes\AssetScope;
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

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new AssetScope);
    }

    public function asset()
    {
        $this->belongsTo(Asset::class);
    }
}
