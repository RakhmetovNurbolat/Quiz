@extends('layouts.main')

@section('page.title', 'User post')

@section('main.content')
        <x-title>
            {{__('user post')}}

            <x-slot name="right">
                <x-button-link href="{{ route('user.posts.create') }}">
                    {{__('Create')}}
                </x-button-link>
            </x-slot>
        </x-title>
        @empty($posts)
            Empty
        @else
            @foreach ($posts as $post)
                <div class="mb-3">
                    <h2 class="h6 mb-2">
                        <a href="{{ route('user.posts.show', $post->id) }}">
                            {{$post->title}}
                        </a>
                    </h2>
                    <div class="small text-muted">
                        {{ $post->published_at->format('d.m.Y H.i.s') }}
                    </div>
                </div>
            @endforeach

            {{$posts->links()}}
        @endempty
@endsection