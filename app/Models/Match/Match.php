<?php

namespace App\Models\Match;

use App\Models\Asset\Asset;
use App\Models\User\User;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    use SoftDeletes, MatchTrait;

    protected $fillable = [
        'asset_id',
        'specs_id',
        'asset_affiliate_id',
        'client_affiliate_id',
        'private_match',
        'seen'
    ];

    public function clientReferrer()
    {
        return $this->belongsTo(User::class, 'client_affiliate_id');
    }

    public function assetReferrer()
    {
        return $this->belongsTo(User::class, 'asset_affiliate_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function specs()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
