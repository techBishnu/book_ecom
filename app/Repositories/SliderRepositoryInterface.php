<?php
namespace App\Repositories;
interface SliderRepositoryInterface {
    public function all();
    public function store($data);
    public function find($id);
    public function update($data,$id);
    public function destroy($id);

}