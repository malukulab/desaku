<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [
        'id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('business_product', function (Builder $builder) {
            $builder->where('is_business_product', false);
        });
    }


    public static function booted()
    {
        static::saving(function ($product) {
            $slug = Str::of($product->title)->slug();

            $product->slug = $slug;
        });
    }

    public function attachments(): MorphToMany
    {
        return $this->morphToMany(
            Attachment::class,
            'record',
            'model_has_attachments'
        );
    }
}
