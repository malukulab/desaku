<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::latest()
            ->paginate(9);

        return view('galleries.documentation.index', compact('documentations'));
    }


    public function show($slug)
    {

        $documentation = Documentation::whereSlug($slug)->first();
        $documentations = Documentation::latest()->limit(10)->get();

        abort_unless(
            !is_null($documentation),
            404
        );

        $embedded = [];

        if (
            !is_null($documentation->embedded_youtube)
            && strlen($documentation->embedded_youtube) > 0
        ) {
            $links = $documentation->embedded_youtube;
            $youtubeIds = explode(',', $links);

            foreach ($youtubeIds as $id) {

                preg_match('/=[A-Za-z0-9]+/i', $id, $matchs);

                $embedded[] = substr($matchs[0], 1);
            }
        }

        return view('galleries.documentation.show', compact('documentation', 'embedded', 'documentations'));
    }
}
