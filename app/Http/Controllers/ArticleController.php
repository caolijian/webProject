<?php

namespace App\Http\Controllers;

use App\Article;
use App\Book;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(2);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_id = request()->get('book_id');
        return view('article.create',compact('book_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        $create_data = [
            'title' => $data['title'],
            'desc' => $data['desc'],
            'content' => $data['content'],
            'user_id' => Auth::user()->id
        ];

        $file = $request->file('cover');
        if ($file) {
            $pic_path = $file->store('public/article');
            $create_data['cover'] = Storage::url($pic_path);
        }
        Book::find($data['book_id'])->article()->create($create_data);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        $create_data = [
            'title' => $data['title'],
            'desc' => $data['desc'],
            'content' => $data['content'],
            'user_id' => Auth::user()->id
        ];

        $file = $request->file('cover');
        if ($file) {
            $pic_path = $file->store('public/article');
            $create_data['cover'] = Storage::url($pic_path);
        }
        Article::find($id)->update($create_data);

        return back()->with('success', '文摘信息修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
