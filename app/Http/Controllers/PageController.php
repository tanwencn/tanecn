<?php

namespace App\Http\Controllers;

use Tanwencn\Blog\Database\Eloquent\Page;

class PageController extends Controller
{

    public function detail($slug)
    {
        $model = Page::findBySlugOrfail($slug);
        return view('page/detail', compact('model'));
    }
}
