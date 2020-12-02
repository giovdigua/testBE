<?php

namespace App\Http\Resources;

use App\Models\Author;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorVolumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $author = Author::find($this->author_id);

        return [
            'idAuthor' => $author->id,
            'firstname' => $author->firstname,
            'lastname' => $author->lastname,
            'nationality' => $author->nationality,
            'idVolum' => $this->id,
            'title'=> $this->title,
            'publication_date'=> $this->publication_date,
            'isbn'=> $this->isbn,
        ];

    }
}
