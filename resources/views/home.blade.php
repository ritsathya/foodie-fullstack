@extends('layouts.app')

@section('content')
<x-carousel :slides="$slides"/>
<div>
    <div class="flex justify-between p-4 w-full bg-white rounded">
        <h3>All-Day Breakfast</h3>
        <a href="#view_all">View All</a>
    </div>
    <div class="grid grid-cols-4 gap-4 px-8 py-24 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</div>
<div>
    <div class="flex justify-between p-4 w-full bg-white rounded">
        <h3>Healthy Treats</h3>
        <a href="#view_all">View All</a>
    </div>
    <div class="grid grid-cols-4 gap-7 px-8 py-24 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</div>

@endsection
