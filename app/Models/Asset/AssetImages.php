<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetImages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'asset_id',
        'image_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

}
