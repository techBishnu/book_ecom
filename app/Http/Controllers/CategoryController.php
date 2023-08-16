<?php
namespace App\Http\Controllers;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo) {
        $this->categoryRepo= $categoryRepo;
    }

    public function index(){
        $category=$this->categoryRepo->all();
        return view('admin.category.index',compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg',
            'status'=>'nullable',
            'slug'=>'required|string',

        ]);
        $this->categoryRepo->store($data);
        return redirect()->route('category')->with('message','Category Created Successfully');
    }

    public function edit($id){
        $category=$this->categoryRepo->find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'status'=>'nullable',
            'slug'=>'required|string',

        ]);
        $this->categoryRepo->update($data,$id);
        return redirect()->route('category')->with('message','Category Updated Successfully');


    }
    public function destroy($id){
        $this->categoryRepo->destroy($id);
        return redirect()->route('category')->with('message','Category Deleted Successfully');

    }
}
