@extends('layouts.app')

@section('content')
<x-carousel :slides="$slides"/>
<div>
    <div class="flex justify-between p-4 w-full bg-white rounded">
        <h3>All-Day Breakfast</h3>
        <a href="#view_all">View All</a>
    </div>
    <div class="grid grid-cols-4 gap-7 px-8 py-24 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach ($posts as $post)
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
            <a href="{{ route('post.detail', $post->id) }}">
                <img class="h-48 w-full rounded-t-lg" src="{{ Storage::disk('s3')->temporaryUrl($post->image_url, '+2 minutes') }}" alt="" />
            </a>
            <div class="p-5">
                <div class="flex space-x-2 items-center mb-4">
                    <img class="w-8 h-8 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                    <h3>{{$post->user->name}}</h3>  
                    <div class="text-sm text-slate-400">posted {{ $post->created_at->diffForHumans() }}</div>
                </div>
                <a href="{{ route('post.detail', $post->id) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h5>
                </a>
                <p class="h-28 border-b overflow-hidden text-left mb-3 font-normal text-gray-700">{{ $post->description }}</p>
                <div class="mb-4">
                    @foreach ($post->category_id as $id)
                    <span class="px-2 py-1 bg-gradient-to-r from-cyan-500 to-green-500 text-sm text-white rounded-md">{{ App\Models\Category::getNameById($id) }}</span>
                    @endforeach
                </div>
                <div class="flex justify-between">
                    <div class="space-x-1">
                        <i class="far fa-clock"></i>
                        <span>{{ $post->preparation_time + $post->cooking_time}} {{ Str::plural('min', $post->cooking_time+$post->preparation_time) }}</span>
                    </div>
                    <div class="text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div>
    <div class="flex justify-between p-4 w-full bg-white rounded">
        <h3>Healthy Treats</h3>
        <a href="#view_all">View All</a>
    </div>
    <div class="grid grid-cols-4 gap-7 px-8 py-24 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach ($slides as $slide)
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="h-48 w-full rounded-t-lg" src="{{ asset('storage/slides/'.$slide->image) }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="overflow-hidden h-48 mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium eros sed accumsan rutrum. Pellentesque a facilisis massa. Integer tempor purus a est molestie tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam quis lobortis ligula. Sed pharetra libero eu dui vulputate, nec venenatis sem iaculis. Integer mollis justo sit amet erat feugiat efficitur. Vestibulum varius dolor eu velit dignissim feugiat. Sed mauris felis, auctor a vehicula id, tempor a ex.</p>
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
