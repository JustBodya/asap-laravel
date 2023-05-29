<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', ['category_title' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $post = Post::query()->create($data);
        return redirect()->route('admin.posts.index')->with(['success' => true, 'message' => 'Статья с ID ' . $post->id . ' записана в БД']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.post.edit', [
            'post' => $post,
            'category_title' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with(['success' => true]);
    }
}
