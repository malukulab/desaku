<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];


    protected static function booted() {

        static::saving(function ($news) {
            $slug = Str::of($news->title)->slug();
            $news->slug = $slug;
        });
    }

    public function scopeSearch(Builder $builder, string $title): Builder
    {
        return $builder->when(
            Str::of($title)->trim()->isNotEmpty(),
            fn (Builder $builder) => $builder->where('title', 'like', "%{$title}%")
        );
    }

    public function scopeFindBySlug(Builder $builder, string $slug): Builder
    {
        return $builder->when(
            !is_null($slug),
            fn (Builder $builder) => $builder->whereSlug($slug)
        );
    }


    public function categories(): MorphToMany
    {
        return $this->morphToMany(
            Category::class,
            'categoriable',
            'model_has_categories',
        );
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
