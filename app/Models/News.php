<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    public function scopeSearch(Builder $builder, string $title): Builder
    {
        return $builder->when(
            Str::of($title)->trim()->isNotEmpty(),
            fn (Builder $builder) => $builder->whereSlug($title)
        );
    }

    public function scopeFindBySlug(Builder $builder, string $slug): Builder
    {
        return $builder->when(
            !is_null($slug),
            fn (Builder $builder) => $builder->whereSlug($slug)
        );
    }
}
