@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full py-8 px-20">
      <div class="mb-8 w-8/12">
        <a href="{{ route('post.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded shadow-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Post</a>
      </div>
      <div class="bg-white w-8/12 p-4 rounded shadow-md mb-4">hello</div>
    </div>
@endsection