<?php

namespace app\Http\Controllers;


class NewsController extends Controller
{

    public function index()
    {
        return view('news.index');
    }

}