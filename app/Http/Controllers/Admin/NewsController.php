<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\Category;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()
            ->paginate(20)
            ->appends('keyword');

        return view('admins.news.index', compact('news'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admins.news.create', compact('categories'));
    }


    public function store(NewsRequest $request)
    {
        $body = $request->only('title', 'content');
        $news = News::create($body);

        $news->categories()->attach($request->categories);

        $file = $request->file('cover');
        $filename = $file->store('news', [
            'disk' => 'public'
        ]);

        $attachment = Attachment::fromFile($file, $filename);

        $news->attachments()->attach([$attachment->id]);

        return redirect()
            ->route('admin.news.index')
            ->with('message', 'Berhasil menambahkan berita');
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admins.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, $id)
    {
        $body = $request->only('title', 'content');
        $news = News::findOrFail($id);

        $news->update($body);
        $news->categories()->sync($request->categories);

        $file = $request->file('cover');
        $filename = $file->store('news', [
            'disk' => 'public'
        ]);

        if ($news->attachments->count() > 0
            && Storage::exists($news->attachments[0]->path)
        ) {
            Storage::delete($news->attachments[0]->path);
        }


        $attachment = Attachment::fromFile($file, $filename);

        $news->attachments()->sync([$attachment->id]);

        return redirect()
            ->route('admin.news.index')
            ->with('message', 'Berhasil mengubah berita');

    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->attachments->count() > 0
            && Storage::exists($news->attachments[0]->path)
        ) {
            Storage::delete($news->attachments[0]->path);
        }

        $news->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus berita');
    }
}
