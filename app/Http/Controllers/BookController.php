<?php
namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Repositories\BookRepositoryInterface;

class BookController extends Controller
{
    protected $bookRepo;
    public function __construct(BookRepositoryInterface $bookRepo) {
        $this->bookRepo= $bookRepo;
    }
    public function index(){
        $book=$this->bookRepo->all();
        return view('admin.book.index',compact('book'));
    }
    public function create(){
        $category=Category::all();
        $author=Author::all();
        return view('admin.book.create',compact('category','author'));


    }
    public function store(Request $request){

        $rules=[
            'name'=>'required|string',
            'slug'=>'required|string',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg',
            'category_id'=>'required',
            'author_id'=>'required',
            'quantity'=>'integer|required',
            'status'=>'nullable',
            'price'=>'required',
            'special'=>'nullable'
        ];
        $data=$request->validate($rules);
     
        $this->bookRepo->store($data);
        return redirect()->route('book')->with('message','Book Added Successfully');
    }
    public function edit($id){
        $category=Category::all();
        $author=Author::all();
        $book= $this->bookRepo->find($id);
        return view('admin.book.edit',compact('category','book','author'));
    }

    public function update(Request $request,$id){

        $data=$request->validate([
            'name'=>'required|string',
            'slug'=>'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'category_id'=>'required',
            'author_id'=>'required',
            'quantity'=>'integer|required',
            'status'=>'nullable',
            'price'=>'required',
            'special'=>'nullable'
        ]);
        $this->bookRepo->update($data,$id);
        return redirect()->route('book')->with('message','Book updated Successfully');

    }
    public function destroy($id){
        $this->bookRepo->destroy($id);
        return redirect()->route('book')->with('message','Book Deleted Successfully');

    }
    public function validate_data($data , $rules){
        $common_ctrl = new CommonController();
        return $common_ctrl->validator($data,$rules);

    }

}
