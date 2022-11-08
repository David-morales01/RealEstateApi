<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    protected $guarded = [];

    use HasFactory;

    protected $casts = [
        'status' => 'boolean',
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner_id()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function business_types_id()
    {
        return $this->belongsTo(BusinessType::class, 'business_types_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
