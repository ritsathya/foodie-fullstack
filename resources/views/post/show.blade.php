@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
      <div class="bg-white border-2 w-6/12 rounded-lg py-4 px-8 mt-8">
        <a href="/post/#{{ $post->id }}" class="block mb-4"><i class="fas fa-angle-left"></i> back</a>
        <x-posts.post-header :post="$post" />
        <x-posts.brief-info :post="$post" :ingredients="$ingredients" />
        <x-posts.ingredient :ingredients="$ingredients"/>
        <x-posts.direction :directions="$directions"/>
      </div>
    </div>
@endsection