<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function markers()
    {
        return $this->hasOne(Marker::class);
    }
}
