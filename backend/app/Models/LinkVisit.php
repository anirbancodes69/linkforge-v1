<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkVisit extends Model
{
    protected $fillable = [
        'link_id',
        'ip_address',
        'country',
        'city',
        'browser',
        'device',
        'platform',
        'user_agent',
        'referrer',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
