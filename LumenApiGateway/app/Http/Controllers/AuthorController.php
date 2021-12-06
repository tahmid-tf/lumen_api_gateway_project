<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;
    public $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }


    public function index()
    {
        return $this->authorService->obtainAuthors();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->authorService->createAuthor($request->all() , Response::HTTP_CREATED );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->authorService->showAuthors($id);

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
        return $this->authorService->editAuthors($request->all() , $id , Response::HTTP_CREATED );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->authorService->deleteAuthors($id);
    }
}
