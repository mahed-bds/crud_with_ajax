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
        return response()->json(['success' => true,'message'=>'data stored Successfully']);
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

    //live search

    public function Search(Request $request){
      
       $output="";
        $search_allPost=Post::where('name','Like','%'.$request->search.'%')->get();
        // return view('welcome', compact('search_allPost'));

        foreach($search_allPost as $search_allPosts){
            $output.='<tr>
            <td>
              '.$search_allPosts->name.'
            </td>
            <td>
              '.$search_allPosts->email.'
            </td>
            
            <td>'.' <button
            onclick="editButton(\''. $search_allPosts->name .'\',\''. $search_allPosts->email .'\',\''. $search_allPosts->id .'\')"
            class=" btn btn-primary edit-btn" data-toggle="modal" data-target="#myModal"
            data-id=" '.$search_allPosts->id.' ">Edit</button> 
            <button class="btn btn-danger delete-btn" data-id="'.$search_allPosts->id.'">Delete</button>'.'</td>
           
            </tr>';
        }
        return response($output );
       

    }
}
