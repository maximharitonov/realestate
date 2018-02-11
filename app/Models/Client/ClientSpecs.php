<?php

namespace App\Models\Client;

use App\Scopes\ClientScope;
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

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ClientScope);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
