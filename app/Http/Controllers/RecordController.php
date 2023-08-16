<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\RecordRepositoryInterface;

class RecordController extends Controller
{
    protected $recordRepo;
    public function __construct(recordRepositoryInterface $recordRepo) {
        $this->recordRepo= $recordRepo;
    }

    public function index(){
        $record=$this->recordRepo->all();
        return view('admin.record.index',compact('record'));
    }
    public function create(){
        $book=Book::all();
        $user=User::all();
        return view('admin.record.create',compact('book','user'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'user_id'=>'integer|required',
            'book_id'=>'integer|required',
        ]);
        $this->recordRepo->store($data);
        return redirect()->route('record')->with('message','Record Created Successfully');

    }
    public function edit($id){
        $book=Book::all();
        $user=User::all();
        $record=$this->recordRepo->find($id);
        return view('admin.record.edit',compact('record','book','user'));
    }
    public function update(Request $request,$id){
        $data=$request->validate([
            'user_id'=>'required|integer',
            'book_id'=>'required|integer',
        ]);
        $this->recordRepo->update($data,$id);
        return redirect()->route('record')->with('message','Record Updated Successfully');


    }
    public function destroy($id){
        $this->recordRepo->destroy($id);
        return redirect()->route('record')->with('message','Record Deleted Successfully');

    }


}
