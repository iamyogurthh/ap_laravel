<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::orderBy('id', 'desc')->get();
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storePostRequest $request)
    {

        Post::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        dd($post->category->name);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storePostRequest $request, Post $post)
    {

        $post->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}