<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Config extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}