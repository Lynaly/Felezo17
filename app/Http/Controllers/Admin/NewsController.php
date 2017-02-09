<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use Auth;
use Illuminate\Http\Request;
use Validator;

class NewsController extends Controller
{

    public function index()
    {
        return view('admin.news.index', [
            'news' => News::orderBy('created_at', 'DESC')->paginate(7)
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('admin.news.create')
                ->withErrors($validator)
                ->withInput([
                    'title' => $request->title,
                    'body'  => $request->body
                ]);
        }

        News::create([
            'title'     => $request->title,
            'body'      => $request->body,
            'user_id'   => Auth::user()->id
        ]);

        return redirect()->route('admin.news.index');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news)
    {
        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('admin.news.edit', [
                'news' => $news
            ])
                ->withErrors($validator)
                ->withInput([
                    'title' => $request->title,
                    'body'  => $request->body
                ]);
        }

        $news->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);

        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), $this->getValidations());
    }

    private function getValidations()
    {
        return [
            'title'  => 'required|string|max:255',
            'body'  => 'required|string'
        ];
    }
}