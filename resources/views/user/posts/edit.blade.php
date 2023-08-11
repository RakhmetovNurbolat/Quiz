@extends('layouts.main')

@section('page.title', 'EDIT post')

@section('main.content')
        <x-title>
            {{__('EDIT post')}}
            <x-slot name="link">
                <a href="{{ route('user.posts.show', $post->id) }}">
                    {{__('prev')}}
                </a>
            </x-slot>
        </x-title>
        <x-post.form action="{{route('user.posts.update', $post->id)}} " method="put" :post=$post>
            <x-button type="sumbit">
                {{__('Save')}}
            </x-button>
        </x-post.form>
        
@endsection
