@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full py-8 px-20">
      <div class="mb-8 w-6/12 md:w-8/12 xl:w-5/12">
        <a href="{{ route('post.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded shadow-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Post</a>
      </div>
      @foreach ($posts as $post)
        <div class="bg-white w-5/12 p-8 mb-4 rounded shadow-md md:w-8/12 xl:w-5/12">
          <div class="flex py-2 mb-4 justify-between space-x-4">
            <div class="flex items-center space-x-2">
              <h3>{{$post->user->name}}</h3>  
              <div class="text-sm text-slate-400">posted {{ $post->created_at->diffForHumans() }}</div>
            </div> 
            <div>
              <button id="dropDown-{{ $loop->index }}" data-dropdown-toggle="dropdown-{{ $loop->index }}" type="button"><i class="fas fa-ellipsis-h"></i></button>
              <!-- Dropdown menu -->
              <div id="dropdown-{{ $loop->index }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded drop-shadow-md w-44 dark:bg-gray-700">
                  <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropDown-{{ $loop->index }}">
                    @if ($post->ownedBy(auth()->user()))
                      <li>
                        <form action="{{ route('post.delete', $post->id) }}" method="POST"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Are you sure?')" type="submit" class="flex space-x-2 items-center w-full"><i class="fas fa-trash-alt mr-1"></i><span>Delete Post</span></button>
                        </form>
                      </li>
                      <li>
                        <a href="{{ route('post.edit', $post->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex space-x-2 items-center"><i class="fas fa-edit"></i><span>Edit post</span></a>
                      </li>
                    @else
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex space-x-2 items-center"><i class="far fa-flag"></i><span>Report Post</span></a>
                      </li>
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex space-x-2 items-center"><i class="far fa-bookmark mr-1"></i><span>Save Post</span></a>
                      </li>
                    @endif
                  </ul>
              </div>
              
            </div>
            </div>
          <p class="mb-4">{{ $post->description }}</p>
          <div class="w-full">
            <img class="object-cover rounded" src="{{ Storage::disk('s3')->temporaryUrl($post->image_url, '+2 minutes') }}" alt="img-placeholder">
          </div>
          <div class="flex space-x-4 mt-4">
            <div>
              <i class="far fa-comment-alt"></i>
              17 Comments
            </div>
          </div>
        </div>
        @endforeach
    </div>
@endsection