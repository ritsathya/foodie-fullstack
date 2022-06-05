@extends('layouts.profile')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-cog"></i>
    <span class="ml-1">Account Setting</span>
  </div>
  <div class="bg-white w-full p-12 mt-4 rounded">
    <form method="POST" action="{{ route('register') }}">
      <div class="mb-3 w-full mt-4 flex flex-col items-center justify-center">
        <img  src="https://cdn-icons-png.flaticon.com/512/147/147142.png" class="w-36 h-36 rounded-full">
        <label for="image" class="inline-block p-1 text-sm m-2 bg-gray-600 text-gray-50 rounded @error('image') border-red-500 @enderror">Change Image</label>
        <input class="hidden" type="file" accept="image/*" name="image" id="image">
        @error('image')
        <div class="text-red-500 mt-2 text-sm">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="relative">
        <label for="name">Username</label>
        <span class="pointer-events-none w-8 mt-3 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-user"></i></span>
        <input type="text" name="name" id="name" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner @error('name') border-red-500 @enderror" placeholder="Choose a name" value="{{ auth()->user()->name }}" >
      </div>
      @error('name')
        <div class="my-2 text-red-500 text-sm">
          {{ $message }}
        </div>
      @enderror
      <div class="mt-4 relative">
        <label for="email">Email</label>
        <span class="pointer-events-none w-8 mt-3 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-envelope"></i></span>
        <input type="email" name="email" id="email" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner @error('email') border-red-500 @enderror" placeholder="Put your email" value="{{ auth()->user()->email }}">
      </div>
      @error('email')
        <div class="my-2 text-red-500 text-sm">
          {{ $message }}
        </div>
      @enderror
      <button class="bg-green-300 p-2 mt-4 rounded">Update Setting</button>
    </form>
  </div>
</div>
@endsection