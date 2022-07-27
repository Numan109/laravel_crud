<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CatagoryController extends Controller
{

    public function catagory()
    {
        return view('users.addCatagory');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:3',
            'catagory_name' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);

        if ($validator->fails()) {
            return redirect('add-catagory')->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        try {

            $filename = $this->imageUpload($request);
            $data['image_path'] =  $filename;
            $demouser = Catagory::create($data);
            Session::flash("message", 'Product Created Successfully');
        } catch (QueryException $e) {
            //return $e->getMessage();
            //Session::flash("message",$e->getMessage());
            Session::flash("message", $e->errorInfo[2]);
        }

        return redirect()->back();
    }

    protected function imageUpload($jjjj)
    {
        if ($jjjj->file('image')) {
            $file = $jjjj->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            return $filename;
        }
    }


    public function show()
    {
        $categories = Catagory::paginate(5);

        return view('users.viewCategory', compact('categories'));
    }


    public function edit($id)
    {
        try{
            $catagory = Catagory::findOrFail($id);

        }catch(QueryException $e){
            Session::flash("message",$e->errorInfo[2]);
        }

         
         return view('users.editCatagory',compact('catagory'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:3',
            'catagory_name' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        try {

            $filename = $this->imageUpload($request);
            $old_image= $request->old_image;
            $data['image_path'] =  $filename ?? $old_image;
            $catagory = Catagory::find($id)->update($data);
            Session::flash("message", 'Product Update Successfully');
        } catch (QueryException $e) {
            //return $e->getMessage();
            //Session::flash("message",$e->getMessage());
            Session::flash("message", $e->errorInfo[2]);
        }

        return redirect('view-catagory');
    }


    public function destroy(Catagory $catagory)
    {
        //
    }
}
