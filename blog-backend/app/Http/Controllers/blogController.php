<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class blogController extends Controller
{
    //Create blog
    public function createBlog(Request $req){
         //validations
         $validate=$req->validate([
            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);

        //validate fields
        if($validate->fails()){    
            return response()->json([
                'message'=>'Please fill all fields',
                'success'=>true
            ]);
        }else{
            $user = auth()->user();
            $inputs=$req->all();

            //Make blog object
            $blog_obj=new Blogs();
            $blog_obj->title=$inputs->title();
            $blog_obj->description=$inputs->description();
            $blog_obj->date=$inputs->date();
            $blog_obj->status=$inputs->status();
            $blog_obj->user_id=$user->id;
            $blog_data=$blog_obj->save();
    
            //Checks if data is stored in db
            if(!empty($result)){
                return response()->json([
                    'message'=>'Successfully Blog added',
                    'success'=>true,
                    'data'=>$token  
                ]);
            }else{
                return response()->json([
                    'message'=>'Something went wront . Could not add blog! ',
                    'success'=>true
                ]);
            }
        }
    }

    //Provide listing of blogs
    public function getBlogsList(Request $req){
        //Get blogs listing
        $blogs_list=Blogs::select('*')->get();

        if(!$blogs_list->isEmpty ()){
            return response()->json([
                'message'=>'Blogs lists',
                'success'=>true,
                'data'=>$blogs_list,
            ]);
        }else{
            return response()->json([
                'message'=>'No Blogs found',
                'success'=>true,
                'data'=>array(),
            ]);
        }
    }
}
