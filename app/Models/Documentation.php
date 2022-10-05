<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Documentation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected static function booted() {

        static::saving(function ($news) {
            $slug = Str::of($news->title)->slug();
            $news->slug = $slug;
        });
    }


    public function attachments()
    {
        return $this->morphToMany(
            Attachment::class,
            'record',
            'model_has_attachments'
        );
    }
}
