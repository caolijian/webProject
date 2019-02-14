<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(2);
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', compact('book/create'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $data = $request->only([
            'title',
            'desc',
            'picture',
            'author',
            'content'
        ]);

        $file = $request->file('picture');

        if ($file) {
            $pic_path = $file->store('public/book');
            $data['picture'] = Storage::url($pic_path);
        }
        Book::create($data);

        return back()->with('success', '新增图书成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $data = $request->only([
            'title',
            'desc',
            'picture',
            'author',
            'content'
        ]);

        $file = $request->file('picture');

        if ($file) {
            $pic_path = $file->store('public/book');
            $data['picture'] = Storage::url($pic_path);
        }

        $book = Book::find($id);
        $book->update($data);

        return back()->with('success', '图书信息修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
    }
}
