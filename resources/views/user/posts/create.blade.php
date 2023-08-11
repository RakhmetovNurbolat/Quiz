@extends('layouts.main')

@section('page.title', 'Create post')

@section('main.content')
        <x-title>
            {{__('Create post')}}
            <x-slot name="link">
                <a href="{{route('user.posts')}}">
                    {{__('prev')}}
                </a>
            </x-slot>
        </x-title>
        <x-post.form action="{{route('user.posts.store')}}" method="post">
            <x-button type="sumbit">
                {{__('Send')}}
            </x-button>
        </x-post.form>
@endsection
