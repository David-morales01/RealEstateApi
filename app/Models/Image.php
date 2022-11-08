<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function marker()
    {
        return $this->belongsTo(Marker::class, 'marker_id');
    }
}
