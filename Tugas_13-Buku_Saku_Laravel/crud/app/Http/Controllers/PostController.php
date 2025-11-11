<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::where('user_id', auth()->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required|min:20', 
        ]);
        
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'user_id' => auth()->id(), 
            'title' => $validatedData['title'], 
            'body' => $validatedData['body'],   
            'image' => $imageName,
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('post.edit', [
            'post' => Post::find($id), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255', 
            'body' => 'required|min:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $post = Post::find($id);

        $imageName = $post->image; 

        if ($request->hasFile('image')) {
            if ($imageName) {
                Storage::delete($imageName); 
            }
            
            $imageName = $request->file('image')->store('images', 'public');
        }

        $post->update([
            'title' => $validatedData['title'],
            'image' => $imageName,
            'body' => $validatedData['body'],
        ]);
        
        return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        
        return redirect()->route('post.index');
    }
}
