<?php
namespace App\Http\Controllers;
use App\Repositories\SliderRepositoryInterface;
use Illuminate\Http\Request;
class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderRepositoryInterface $sliderRepo) {
        $this->sliderRepo= $sliderRepo;
    }

    public function index(){
        $category=$this->sliderRepo->all();
        return view('admin.slider.index',compact('category'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg',
            'status'=>'nullable',
        ]);
        $this->sliderRepo->store($data);
        return redirect()->route('slider')->with('message','Slider Created Successfully');
    }

    public function edit($id){
        $category=$this->sliderRepo->find($id);
        return view('admin.slider.edit',compact('category'));
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'status'=>'nullable',
        ]);
        $this->sliderRepo->update($data,$id);
        return redirect()->route('slider')->with('message','slider Updated Successfully');


    }
    public function destroy($id){
        $this->sliderRepo->destroy($id);
        return redirect()->route('slider')->with('message','slider Deleted Successfully');

    }
}
