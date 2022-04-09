<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAuthController extends Controller
{
    //Register api
    public function register(Request $req){
        //validations
        $validate=$req->validate([
            'Firstname'=>'required',
            'Lastname'=>'required',
            'Email'=>['required'],
            'Password'=>'required',
            'DOB'=>'required',
        ]);

        //Create user object
        $user_obj=new User();
        $user_obj->Firstname=$req->Firstname;
        $user_obj->Lastname=$req->Lastname;
        $user_obj->Email=$req->Email;
        $user_obj->Password=bcrypt($req->Password);
        $user_obj->DOB=$req->DOB;
        $user_obj->DOB=$req->role;
        $user_data=$user_obj->save();

        // $token = $user_data->createToken('auth_token')->plainTextToken;

        //Checks if data is stored in db
        if(!empty($user_data)){
            return response()->json([
                'message'=>'Successfully Registered',
                'success'=>true,
                // 'data'=>$token  
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wront . Could not register! ',
                'success'=>false
            ]);
        }
    }

    //Login api
    public function login(Request $req){
        //validations
        $validate=$req->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if($validate->fails()){
            if(!Auth::attmpt($validate)){
                return response()->json([
                    'message'=>'Credential does not match',
                    'success'=>false,
                ]);
            }else{
                return response()->json([
                    'message'=>'Success',
                    'success'=>true,
                    'token'=> auth()->user()->createToken()->plaintextToken
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Please fill all fields',
                'success'=>true
            ]);
        }
    }
}
