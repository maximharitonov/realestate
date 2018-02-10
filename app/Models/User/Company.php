<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city',
        'street',
        'street_num',
        'zip_code',
        'logo_path',
    ];

    public function user()
    {
        $this->belongsToMany(User::class);
    }
}
