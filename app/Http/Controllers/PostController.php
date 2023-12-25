<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->latest()->get(); // Retrieve all posts with associated user, ordered by latest
        return view('menupages.blog', compact('posts'));
    }

    public function makePost(Request $request) {
        $incomingfields = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $incomingfields['title'] = strip_tags($incomingfields['title']);
        $incomingfields['content'] = strip_tags($incomingfields['content']);
        $incomingfields['user_id'] = auth()->id();

        Post::create($incomingfields);

        return redirect('/home/blog');
    }

    public function deletePost(Post $post) {
        if(auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/home/blog');
    }

    public function updatePost(Request $request, Post $post)
{
    $post->update($request->all());

    return response()->json([
        'title' => $post->title,
        'content' => $post->content,
    ]);
}


}
