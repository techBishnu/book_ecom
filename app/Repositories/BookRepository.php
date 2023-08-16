<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository implements BookRepositoryInterface {
   
    public function all(){
        return Book::with('category','author')->latest()->get();
    }
    public function store($data){
        if(array_key_exists('status',$data)){

            $data['status'] == "on" ?  $data['status'] = 1 :  $data['status'] = 0;
          }
          else{
              $data['status']=0;
          }
        if(array_key_exists('special',$data)){

           $data['special'] = 1;
          }
          else{
              $data['special']=0;
          }
         
       
        $book= Book::create($data);
        if($file=$data['image']){
            $book->addMedia($file)->toMediaCollection('book_image');
        }
     
    }

    public function find($id){
        return  Book::find($id);
    }
    public function update($data,$id){
        if(array_key_exists('status',$data)){

            $data['status'] = 'Trending' ;
          }
          else{
              $data['status']='Recent';
          }
        if(array_key_exists('special',$data)){

            $data['special'] = '1' ;
          }
          else{
              $data['special']='0';
          }
        $book=Book::find($id);
        // dd($data);
        
        if($book){
            $book->update($data);
            
        }
        if(array_key_exists('image',$data)){
            $file=$data['image'];
            $book->clearMediaCollection('book_image');
            $book->addMedia($file)->toMediaCollection('book_image');
       
        }
    }
    public function destroy($id){
        $book=Book::find($id);
        if($book){
            $book->clearMediaCollection('book_image');
            $book->delete();

        }
    }
}
