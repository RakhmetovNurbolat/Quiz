@extends('layouts.main')

@section('page.title', 'User post')

@section('main.content')
        <x-title>
            {{  $post->title }}

            <x-slot name="right">
                <x-button-link href="{{route('user.posts.edit', $post->id)}}">
                    {{__('Edit')}}
                </x-button-link>
            </x-slot>
        </x-title>
        <div class="small text-muted">
            {{ now()->format('d.m.Y H.i.s') }}
        </div>
        <div class="mb-3">
            <h2 class="h6 mb-2">
                {!! $post->content !!}  
            </h2>
            <a href="{{ route('user.posts') }}">
                prev
            </a>
        </div>
@endsection