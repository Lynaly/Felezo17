<?php

namespace App\Http\Controllers;


use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        return view('news.index', [
            'news' => News::orderBy('created_at', 'DESC')->get()
        ]);
    }

}