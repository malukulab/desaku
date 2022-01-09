<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function fromFile(UploadedFile $file, string $filename)
    {
        return static::create([
            'original_filename' => $file->getClientOriginalName(),
            'filename' => Str::of($filename)->split('/\//')->last(),
            'content_type' => $file->getMimeType(),
            'path' => $filename,
            'size' => $file->getSize()
        ]);
    }


    public function getIsImageAttribute(): bool
    {
        return preg_match('/image\/*/', $this->content_type);
    }
}
