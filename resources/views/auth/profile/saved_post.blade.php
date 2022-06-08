@extends('layouts.profile')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <p>Saved Posts</p>
  </div>
  <div class="grid grid-cols-4 gap-4 mt-4 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
    @foreach ($posts as $post)
        <x-post-card :post="$post" />
    @endforeach
  </div>
</div>
@endsection