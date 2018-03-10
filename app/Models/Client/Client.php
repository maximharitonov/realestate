<?php

namespace App\Models\Client;

use App\Models\Asset\Asset;
use App\Models\Match\Match;
use App\Models\User\User;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, ClientTrait;

    protected $fillable = [
        'referrer_id',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function specs()
    {
        return $this->hasMany(ClientSpecs::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'owner_id');
    }

}
