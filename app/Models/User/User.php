<?php

namespace App\Models\User;

use App\Models\Asset\Asset;
use App\Models\Client\Client;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'referrer_id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'referrer_id');
    }
}
