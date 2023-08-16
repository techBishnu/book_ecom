<?php
namespace App\Repositories;

use App\Models\Record;

class RecordRepository implements RecordRepositoryInterface {
    public function all(){
        return Record::with('user','book')->get();
    }
    public function store($data){
        return Record::create($data);
    }
    public function find($id){
        return Record::find($id);
    }
    public function update($data,$id){
        $record= Record::find($id);
        if($record){
            $record->update($data);
        }
    }
    public function destroy($id){
        $record=Record::find($id);
        if($record){
            $record->delete();
        }
    }
}