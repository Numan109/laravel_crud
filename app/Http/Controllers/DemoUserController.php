<?php

namespace App\Http\Controllers;

use App\Models\demo_user;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDOException;

class DemoUserController extends Controller
{
    public function add_demo_user(){
        return view('users.add_demo_user');
    }

    public function demouser(Request $request){
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:demo_users|max:255',
            'name' => 'required',
            'password' => 'min:6|required_with:re_password|same:re_password',
            're_password' => 'min:6'
        ]);

        //dd($validator->validated());

        // $data=[];
        // $data['name']= $request->name;
        // $data['email']= $request->email;
        // $data['phone']= $request->phone;
        // $data['password']= $request->password;
        // return($data);

        if ($validator->fails()) {
            return redirect('/add_demo_user')->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // echo "<pre>";
        // print_r($data);

        
        $data['phone'] = $request->phone;

        // echo "<pre>";
        // print_r($data);
        // exit();

      try{
          $demouser= demo_user::create($data);
          Session::flash("message",'User Created Successfully');

      }catch(QueryException $e){
          return $e->getMessage();
          //Session::flash("message",$e->getMessage());
          Session::flash("message",$e->errorInfo[2]);
      }catch (PDOException $e) {
        dd($e);
      } 

    return redirect()->back();
        
    }
}
