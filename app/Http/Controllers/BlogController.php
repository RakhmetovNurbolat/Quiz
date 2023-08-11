<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        $categories = [ 
            null    => __('ves cotegory'), 
            1       => __('one'), 
            2       => __('two'),
        ];

        // //select * from posts
        // $posts = Post::all();

        // //select id, title, published_at from posts
        // $posts = Post::all(['id', 'title', 'published_at']);

        //select * from posts
        // $posts = Post::query()->get();
        $posts = Post::query()->get(['id', 'title', 'published_at']);
        // $posts = Post::query()->get(['id', 'title', 'published_at'])->toArray();
        // $posts = Post::query()->limit(12)->get();

        // $posts = Post::query()->limit(12)->offset(12)->get();
        // dd($posts->toArray());
        
        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 12;
        $offset = $limit * ($page-1);
        //paginasia


        $posts = Post::query()->limit($limit)->offset($offset)->get();
        $posts = Post::query()->paginate($limit);

        //asc = zxc
        //desc = abc
        //>orderBy sort
        // $posts = Post::query()->orderBy('published_at', 'desc')->paginate(12);

        $posts = Post::query()->latest('published_at')->paginate(12);
        
        $posts = Post::query()
            ->where('id', '!=', 1005)
            ->paginate(12);

        $search = 'dolor';    
        $posts = Post::query()
            ->where('title', 'like', "%{$search}%")
            ->paginate(12);
        // $posts = Post::query()->oldest('published_at')->paginate(12);

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post){

        // dd($post);
        // // $post = Post::query()->first(['id', 'title', 'content']);

        // // $post = Post::query()->find($post, ['id' , 'title', 'content']);
        // // $post = Post::query()->findOrFail($post, ['id' , 'title', 'content']);

        // // $posts = Post::query()->find([1001,1002,1010]);
        // // $posts = Post::query()->find([1001,1002,1010], ['id' , 'title', 'content']);
        
        // $post = Post::query()->findOrFail($post, ['id' , 'title', 'content']);
        
        return view('blog.show', compact('post'));
    }

    public function store(Request $request){
        dd($request->all());
    }
    public function like(){
        return view('blog.like');
    }
}

