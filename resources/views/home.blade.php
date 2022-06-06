@extends('layouts.app')

@section('content')
<x-carousel :slides="$slides"/>
<div>
    <div class="flex justify-between items-center p-6 w-full bg-white rounded">
        <h3 class="text-lg p-2 uppercase">Recipes of the day</h3>
        <a href="{{ route('listing') }}">View All <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="grid grid-cols-4 gap-4 px-8 py-12 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</div>

@endsection
