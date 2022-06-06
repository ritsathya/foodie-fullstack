@extends('layouts.post')

@section('content')
<div class="p-6 grow">
  <div class="flex justify-between items-center p-4 mb-4 bg-white text-lg rounded">
    <p>Recipe Results for {{ request('search') }}</p>
    <form action="/listing">
      <input type="text" class="hidden" name="search" value="{{ request('search') }}">
      <select name="category" id="category" class="p-1 rounded">
        @foreach (App\Models\Category::get() as $category)
          <option  {{ request('category') == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->section }}</option>
        @endforeach
      </select>
      <button class="bg-green-300 px-2 py-1 rounded space-x-2 hover:bg-green-400"><span>filter</span><i class="fas fa-filter text-sm"></i></button>
    </form>
  </div>
  <div class="grid grid-cols-4 gap-4 md:grid-cols-2 md:p-4 xl:grid-cols-4 2xl:grid-cols-5">
    @foreach ($posts as $post)
        <x-post-card :post="$post" />
    @endforeach
  </div>
  <div class="mt-2">
    {{ $posts->links() }}
  </div>
</div>

@endsection