<?php
namespace App\Repositories;

use App\Models\Author;

class AuthorRepository implements AuthorRepositoryInterface {
    public function all(){
        return Author::latest()->get();
    }

    public function store($data){
        return Author::create($data);
    }

    public function find($id){
        return Author::find($id);
    }

    public function update($data,$id){
        $author= Author::find($id);
        if($author){
            $author->update($data);
        }
    }
    public function destroy($id){
        $author=Author::find($id);
        if($author){
            $author->delete();
        }
    }
}