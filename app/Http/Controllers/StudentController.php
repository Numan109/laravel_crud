<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{

    public function student()
    {
        return view('users.addStudent');
    }

 
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'roll'=>'required',
        'class'=>'required',
        'name'=>'required',
        'father_name'=>'required',
        'mother_name'=>'required',
        'date_of_birth'=>'required',
        'contuct_number'=>'required',
       'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if($validator->fails()){
            return redirect('add-student')->withErrors($validator)->withInput();
        }
       $data= $validator->validated();
       
        try{
            $filename=$this->imageUpload($request);
            $data['image']=$filename;
            $student=Student::create($data);
            Session::flash("message",'Student create successfully');
        }catch(QueryException $e){
            Session::flash("message",$e->errorInfo[2]);
        }
        return redirect()->back();
    }

    protected function imageUpload($image){
        if($image->file('image')){
            $file=$image->file('image');
            $filename=date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'),$filename);
            return $filename;
        }
    }
 
    public function show()
    {
        $students= Student::paginate(10);
        return view('users.viewStudent', compact('students'));
    }

 
    
    public function edit($std_id)
    {
        try{
            $student = Student::findOrFail($std_id);
        }catch(QueryException $e){
            Session::flash("message",$e->errorInfo[2]);
        }

         //dd($student);
     return view('users.editStudent',compact('student'));
    }

 
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'roll'=>'required',
            'class'=>'required',
            'name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'date_of_birth'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
    
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data= $validator->validated();
           
            try{
                $filename=$this->imageUpload($request);
                $old_image = $request->old_image;
                $data['image']=$filename ?? $old_image;
                $student=Student::find($id)->update($data);
                Session::flash("message",'Student Update successfully');
            }catch(QueryException $e){
                Session::flash("message",$e->errorInfo[2]);
            }
            return redirect('view-student');
    }


    public function destroy($id)
    {
        $student = Student::find($id);

        try{
            if($student){
                $student->delete();
                Session::flash("message",'Student delete successfully');
            }else{
                Session::flash("message",'Student information not found !!');
            }
        }catch(QueryException $e){
            Session::flash("message",$e->errorInfo[2]);
        }
        return redirect()->back();
    }
}
