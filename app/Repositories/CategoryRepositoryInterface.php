<?php
namespace App\Repositories;
interface CategoryRepositoryInterface {
    public function all();
    public function store($data);
    public function find($id);
    public function update($data,$id);
    public function destroy($id);

    
}