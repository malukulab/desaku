<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Setting extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'array'
    ];

    protected $guarded = [
        'id'
    ];

    public function scopeFindKey(Builder $builder, string $key): Builder
    {
        return $builder->where('key', $key);
    }
}
