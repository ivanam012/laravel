<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;

class RegisterController extends BaseController
{
    

    public function register(Request $request){

        
        $validator = Validator::make($request->all(),[
            'name'=>'required', 
            'email'=>'required|email', 
            'password'=>'required',
            'c_password'=>'required|same:password' 
        ]);



        

        if($validator->fails()){
            return $this->sendEror('Validation error.',$validator->erors());
        }

        
        $input = $request->all(); 
        $input['password']=bcrypt($input['password']); 
        $user = User::create($input);
        
        $success['token']=$user->createToken('MyApp')->accessToken;
        
        $success['name']=$user->name;

        return $this->sendResponse($success,' User registered sucessfully');

    }

    public function login(Request $request){

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user(); 
            $success['token']=$user->createToken('MyApp')->accessToken; 
            
            $success['name']=$user->name;
            return $this->sendResponse($success,' User login sucessfully');

        }else{ 
            return $this->sendError('Unauthorised!',['error'=>'Unauthorised!']);

        }

    }

}
