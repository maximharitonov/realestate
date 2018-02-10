<?php

namespace App\Model;

use App\Models\Asset\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetPurposes extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'asset_id',
        'purpose_id',
        'value'
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
