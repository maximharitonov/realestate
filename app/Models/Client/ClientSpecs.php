<?php

namespace App;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientSpecs extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'asset_type',
        'purpose_id',
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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
