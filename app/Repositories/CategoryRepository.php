<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {
    public function all(){
        return Category::all();
    }
    public function store($data){
        
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category= Category::create($data);
        if($file=$data['image']){
            $category->addMedia($file)->toMediaCollection('category_image');
        }
        return $category;
    }

    public function find($id){
        return  Category::find($id);
    }
    public function update($data,$id){
       
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category=Category::find($id);
        if($category){
            $category->update($data);
            
           
        }
        if(array_key_exists('image',$data)){
            $file=$data['image'];
            $category->clearMediaCollection('category_image');
            $category->addMedia($file)->toMediaCollection('category_image');
       
        }
    }
    public function destroy($id){
        $category=Category::find($id);
        if($category){
            $category->clearMediaCollection('category_image');
            $category->delete();

        }
    }
}