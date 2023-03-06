<?php

namespace App\Http\Controllers;

use App\Models\CreatePost;
use Illuminate\Http\Request;
use App\Models\Post;

class CreatePostController extends Controller
{

    public function index()
    {
    
        $allPost = Post::latest()->get();
        return view('welcome', compact('allPost'));
    }

    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'name' => 'required' ,
            'email' => 'required|unique:posts',
        ]);
        
        // create new user
        $user = new Post;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // return response
        return response()->json(['success' => true]);
    }

  

    public function destroy($id){
        $data = Post::findOrFail($id);
        $data->delete();
        return response()->json(['success' => true]);
    }


    public function edit(Request $request,$id){
        
        $request->validate([
            'name' => 'required' ,
            'email' => 'required|unique:posts,email,'.$id,
        ]);
        
        // create new user
        $user = Post::find($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return response()->json(['success' => true,'message'=>'Message Updated Successfully']);
    }
}
