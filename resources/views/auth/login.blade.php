@extends('layouts.app')

@section('content')
  <div class="flex justify-center w-full">
    <div class="bg-white p-4 mt-8 w-4/12 rounded-lg">
      <form action="">
        <h2 class="font-medium leading-tight text-center text-4xl mt-0 mb-4">Login</h2>
        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" class="bg-gray-100 w-full p-4 border-2 rounded-lg" placeholder="Put your email" value="">
        </div>
        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" class="bg-gray-100 w-full p-4 border-2 rounded-lg" placeholder="Choose a password" value="">
        </div>
        <div class="mb-4">
          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
          </div>
        </div>
        <button type="submit" class="bg-green-500 font-bold text-white text-xl p-4 w-full rounded">Login</button>
      </form>
    </div>
  </div>
@endsection