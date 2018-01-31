<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Model\Tag;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('pages.home', compact('post'));
    }

    public function create()
    {
        return view('pages.post.create');
    }
    
    public function detail(Request $request, $id)
    {
        $post = Post::find($id);
        return view('pages.post.detail', compact('post'));
    }

    public function tag(Request $request, $id)
    {
        $tag = Tag::find($id);

        $post = $tag->posts;

        return view('pages.home', compact('post', 'tag'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = Post::create([
            'title' => $request->title,
            'body'  => $request->body
        ]);

        if($post) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];
            foreach($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name'=>$tagName]);
                if($tag) {
                    $tagIds[] = $tag->id;
                }

            }
            $post->tags()->attach($tagIds);
        }

        return redirect()->route('home');
        
    }
}
