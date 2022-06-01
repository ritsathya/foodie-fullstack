@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full py-8 px-20">
      <div class="mb-8 w-6/12 md:w-8/12 xl:w-5/12">
        <a href="{{ route('post.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded shadow-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Post</a>
      </div>
      @foreach ($posts as $post)
        <section id="{{ $post->id }}" class="bg-white w-5/12 p-8 mb-4 rounded shadow-md md:w-8/12 xl:w-5/12">
          <div class="flex py-2 mb-4 justify-between space-x-4">
            <div class="flex items-center space-x-2">
              <h3>{{$post->user->name}}</h3>  
              <div class="text-sm text-slate-400">posted {{ $post->created_at->diffForHumans() }}</div>
            </div> 
            @auth
            <x-posts.ellipsis-menu id="dropDown-{{ $loop->index }}" toggle_id="dropdown-{{ $loop->index }}" :post="$post"/>
            @endauth
          </div>
          <div class="flex justify-between items-center space-x-8 mb-4">
            <p class="truncate"><span class="text-lg font-semibold">[{{ $post->title }}]</span> {{ $post->description }}</p>
            <a href="{{ route('post.detail', $post->id) }}" class="shrink-0 flex items-center space-x-2"><span>view detail</span><i class="fas fa-angle-right"></i></a>
          </div>
          <div class="w-full">
            <img class="object-cover rounded" src="{{ Storage::disk('s3')->temporaryUrl($post->image_url, '+2 minutes') }}" alt="img-placeholder">
          </div>
          <div class="flex space-x-4 mt-4">
            <div>
              <i class="far fa-comment-alt"></i>
              17 Comments
            </div>
          </div>
        </section>
        @endforeach
    </div>
@endsection