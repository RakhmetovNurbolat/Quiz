@props(['method' => 'GET'])

@php
    $method = strtoupper($method);
    $_method = in_array($method, ['GET', 'POST']);
@endphp

<form {{$attributes}} method="{{ $_method ? $method : 'POST' }}">
    
    @unless ($_method)
        @method($method)
    @endunless
    @unless ($method == 'GET')
        @csrf
    @endunless
   
    
    {{ $slot }}
</form>