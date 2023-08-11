<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index(){
        $posts = Post::query()->paginate(12);
        return view('user.posts.index', compact('posts'));
    }

    public function create(){
        return view('user.posts.create');
    }

    public function store(StorePostRequest $request){
        $validated = $request->validated();
        // dd($request->all());
        // $title = $request->input('title');
        // $content = $request->input('content');
        // dd($title, $content);

        // $post = new Post;

        // $validated = validator($request->all(), [
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:100000'],
        // ])->validate();

        // $validated = $request->validate([
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:100000'],
        // ]);
        
        // $validated = validate($request->all(), [
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:100000'],
        // ]);       
        
        // $validated = validate($request->all(), Post::getRules());     

        //dd($validated);

        // if(true){
        //     throw ValidationException::withMessages([
        //         'account' => __('Now price'),
        //     ]);
        // }

        $validated = $request->validate([
            'title'         => ['required', 'string', 'max:100'],
            'content'       => ['required', 'string', 'max:100000'],
            'published_at'  => ['nullable', 'string', 'date'],
            'published'     => ['nullable', 'boolean'],
        ]);

        $post = Post::query()->create([
            'user_id'       => User::query()->value('id'),
            'title'         => $validated['title'],
            'content'       => $validated['content'],
            'published_at'  => new Carbon($validated['published_at'] ?? null),
            'published'     => $validated['published'] ?? false,
        ]);


        // for($i = 0; $i<50; $i++){
        //     $post = Post::query()->create([
        //         'user_id'       => User::query()->value('id'),
        //         'title'         => fake()->sentence(),
        //         'content'       => fake()->paragraph(),
        //         'published_at'  => fake()->dateTimeBetween(now()->subYear(), now()),
        //         'published'     => true,
        //     ]);
        // }

        // echo 'ok';
        //dd($post->toArray());
        alert(__('Сохранено!'));
        return redirect()->route('user.posts.show', 123);
    }

    public function show( $post ){
        $post = (object)[
            'id' => 10,
            'title' => 'Погиб один из попавших в аварию в Турции казахстанских туристов',
            'content' => 'Скончался казахстанский турист, который был госпитализирован и перенес операцию после <strong> ДТП </strong>в турецкой провинции',
        ];
        $posts = array_fill(0,10, $post);
        return view('user.posts.show ',compact('post'));
    }

    public function edit( $post){
        $post = (object)[
            'id' => 10,
            'title' => 'Погиб один из попавших в аварию в Турции казахстанских туристов',
            'content' => 'Скончался казахстанский турист, который был госпитализирован и перенес операцию после <strong> ДТП </strong>в турецкой провинции',
        ];
        $posts = array_fill(0,10, $post);
        return view('user.posts.edit',compact('post'));
    }
    public function update(Request $request, $post ){
        $title = $request->input('title');
        $content = $request->input('content');
        //dd($title, $content);
        return redirect()->route('user.posts.show', $post);
        //return redirect()->back();
    }
    public function delete($post){
        return redirect()->route('user.posts');
    }
}
