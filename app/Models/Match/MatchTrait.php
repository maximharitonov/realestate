<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 06/03/18
 * Time: 00:02
 */

namespace App\Models\Match;


use Illuminate\Support\Facades\Auth;

trait MatchTrait
{
    public function getAssetOwnerAttribute()
    {
        return $this->asset_affiliate_id == Auth::id() ? $this->asset->client : '';
    }

    public function getAssetAttribute()
    {
        return $this->asset_affiliate_id == Auth::id() ? $this->asset : '';
    }

    public function getClientAttribute()
    {
        return $this->client_affiliate_id == Auth::id() ? $this->specs->client : '';
    }

}