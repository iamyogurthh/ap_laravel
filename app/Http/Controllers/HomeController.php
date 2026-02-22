<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvnet;
use App\Http\Requests\storePostRequest;
use App\Mail\PostStored;
use App\Models\Category;
use App\Models\Post;
use App\Notifications\PostCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Notification::send(Auth::user(), new PostCreatedNotification());
        //echo 'notification sent';
        //exit();

        $data = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storePostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $post = Post::create($validated);

        event(new PostCreatedEvnet($post));
        return redirect('/posts')->with('status', config('test.message.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view', $post);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('view', $post);
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storePostRequest $request, Post $post)
    {

        $validated = $request->validated();
        $post->update($validated);

        return redirect('/posts')->with('status', config('test.message.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status', config('test.message.deleted'));
    }
}
