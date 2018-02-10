<?php

namespace App\Models\Client;

use App\Models\User\User;
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

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
