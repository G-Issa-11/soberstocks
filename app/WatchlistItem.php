<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    protected $fillable = ['symbol', 'company_name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
