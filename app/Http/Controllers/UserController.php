<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function addUser()
    {
        return view('users.addUser');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('add-user')
                        ->with('Success','You have Successfully loggedin');
        }
  
        return back()->with('error','Oppes! You have entered invalid credentials'); 
    }

    public function saveUserold(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => ['required','unique:users,email'],
            'name' => ['required','min:3'],
            'password' => ['required','min:6']
        ]);

        if ($validator->fails()) {
           return sendErrorResponse('Client Validation error',$validator->errors(), 422);
        }

        try{
            $data = $validator->validated();
            $saveuser = User::create($data);
            return sendSuccessResponse($saveuser, 'User Created Successfully', 201);
            
        }catch(QueryException $e){
            return sendErrorResponse('Something Went Wrong',$e->getMessage(), 500);
        }

       return redirect()->back();
    }

    public function saveUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = [];

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        try{
            $saveuser = User::create($data);
            Session::flash("message",'User Created Successfully');
        }catch(QueryException $e){
            Session::flash("message",$e->getMessage());
        }

        return redirect()->back();

    }

}
