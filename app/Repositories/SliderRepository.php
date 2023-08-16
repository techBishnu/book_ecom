<?php
namespace App\Repositories;

use App\Models\Slider;

class SliderRepository implements SliderRepositoryInterface {
    public function all(){
        return Slider::all();
    }
    public function store($data){
        
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category= Slider::create($data);
        if($file=$data['image']){
            $category->addMedia($file)->toMediaCollection('category_image');
        }
        return $category;
    }

    public function find($id){
        return  Slider::find($id);
    }
    public function update($data,$id){
       
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category=Slider::find($id);
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
        $category=Slider::find($id);
        if($category){
            $category->clearMediaCollection('category_image');
            $category->delete();

        }
    }
}