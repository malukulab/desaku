<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Attachment;

class UploadersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'attachments.*' => 'file|mimetypes:image/png,image/jpeg,video/mp4|max:20000'
        ]);

        $file = $request->file('attachments')[0];
        $path = $file->store('attachments', ['disk' => 'public']);

        $attachment = Attachment::fromFile($file, $path);

        return $attachment->id;
    }
}
