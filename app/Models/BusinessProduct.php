<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessProduct extends Product
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('business_product', function (Builder $builder) {
            $builder->where('is_business_product', true);
        });
    }
}
