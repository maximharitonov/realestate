<?php

namespace App\Models\Asset;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'owner_id',
        'referrer_id',
        'asset_type'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'owner_id');
    }

    public function info()
    {
        return $this->hasOne(AssetInfo::class);
    }

    public function images()
    {
        return $this->hasMany(AssetImages::class);
    }

    public function purposes()
    {
        return $this->hasMany(AssetPurposes::class);
    }
}
