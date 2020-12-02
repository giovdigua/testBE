<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        if (count($authors) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No Authors found'
            ],204);
        }
        return response()->json([
            'success' => true,
            'Authors' => $authors
        ],200);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'nationality' => 'required|min:2',
        ]);

        $author = Author::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
        ]);

        return response()->json(['Author'=> $author],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $author =  Author::findOrFail($author->id);
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'No Author with '.$author->id.' found'
            ],404);
        }
        return response()->json([
            'success' => true,
            'Author' => $author
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

        $this->validate($request, [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'nationality' => 'required|min:2',
        ]);
        $author->fill($request->all());
        $author->save();

        return response()->json(['Author_Update'=> $author],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json(['Author_Deleted'=> $author],200);
    }
}
