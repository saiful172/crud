<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function ourfilestore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg',

        ]);
        //Upload image
        $imageName = time() . '.' . $request->image->extension();
        
        // Add new post
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName ;
        $post->save();
        return redirect()->route('home')->with('success', 'Post created successfully.');
    }
}
