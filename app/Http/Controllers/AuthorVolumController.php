<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorVolumResource;
use App\Models\Volum;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorVolumResourceCollection;


class AuthorVolumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author)
    {

        $volums = $author->volums;
        return new AuthorVolumResourceCollection($volums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Author $author)
    {
        try {

            # code...
            $request['author_id'] = $author->id;
            $this->validate($request, [
                'title' => 'required|min:2',
                'isbn' => 'required|min:13|max:13',
                'publication_date' => 'required|date_format:Y-m-d',
                'author_id' => 'required|numeric'
                ]);

                $volum = Volum::create($request->all());

                return new AuthorVolumResource($volum);
            } catch (\Throwable $th) {
                //throw $th;
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author,Volum $volum)
    {
        $volum = Volum::where('author_id',$author->id)->find($volum->id);

        return new AuthorVolumResource($volum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Author $author,Volum $volum)
    {
        $request['author_id'] = $author->id;
        $this->validate($request, [
            'title' => 'required|min:2',
            'isbn' => 'required|min:13|max:13',
            'publication_date' => 'required|date_format:Y-m-d',
            'author_id' => 'required|numeric'
        ]);

        $volum = Volum::where('author_id',$author->id)->findOrFail($volum->id);

        $volum->fill($request->all());
        $volum->save();

        return new AuthorVolumResource($volum);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author,Volum $volum)
    {
        $volum = Volum::where('author_id',$author->id)->findOrFail($volum->id);
        $volum->delete();
        return response()->json(['Volume_Deleted'=> $volum->title],200);
    }
}
