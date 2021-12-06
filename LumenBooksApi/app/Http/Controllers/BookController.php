<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return $this->successResponse($book);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =
        [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',

        ];


        $this->validate($request,$rules);

        $book = Book::create($request->all());
        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return $this->successResponse($book);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules =
        [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];


        $this->validate($request,$rules);

        $book = Book::findOrFail($id);
        $book->fill($request->all());

       if($book->isClean()){
        return $this->errorResponse("At least one value must be changed",Response::HTTP_UNPROCESSABLE_ENTITY);
       }

       $book->save();
       return $this->successResponse($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return $this->successResponse($book);
    }
}
