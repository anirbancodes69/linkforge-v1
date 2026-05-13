<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'user_id',
        'guest_token',
        'original_url',
        'short_code',
        'custom_alias',
        'clicks_count',
        'expires_at',
        'is_active',
        'safety_status',
        'scanned_at',
        'scan_reason',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
        'scanned_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return $this->hasMany(LinkVisit::class);
    }
}
