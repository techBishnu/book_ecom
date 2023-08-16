<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Repositories\AuthorRepositoryInterface;
use Doctrine\Inflector\Rules\Spanish\Rules;

class AuthorController extends Controller
{
  
    protected $authorRepo;
    public function __construct(AuthorRepositoryInterface $authorRepo) {
        $this->authorRepo= $authorRepo;
    }
    public function index(){
       $author= $this->authorRepo->all();
        return view('admin.author.index',compact('author'));
    }
    public function create(){
        return view('admin.author.create');
    }
    public function store(Request $request){
       
        $rules=[
            'name'=>'required|string',
            'description'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ];
        $data=$request->validate($rules);
        // $this->validate_data($data,$rules);
       
            $this->authorRepo->store($data);
            return redirect()->route('author')->with('message','Author Added Successfully');
    }
    public function edit($id){
        $author=$this->authorRepo->find($id);
        return view('admin.author.edit',compact('author'));
    }
    public function update(Request $request,$id){
        $rules=[
            'name'=>'required|string',
            'description'=>'required',
            'address'=>'required',
            'phone'=>'required', 
        ];
          $data=$request->all();
          $request->validate($rules);

        $this->authorRepo->update($data,$id);
        return redirect()->route('author')->with('message','Author Updated Successfully');
       
        }
    public function destroy($id){
        $this->authorRepo->destroy($id);
        return redirect()->route('author')->with('message','Author Deleted Successfully');

    }
    public function validate_data($data , $rules){
        $common_ctrl = new CommonController();
        return $common_ctrl->validator($data,$rules);

    }
    
   
}
