@extends('layouts.app')

@section('content')
  <div class="flex justify-center w-full">
    <div class="bg-white p-8 mt-[100px] w-3/12 rounded-lg shadow-xl">
      <form action="">
        <h2 class="font-medium leading-tight text-center text-4xl mt-0 mb-4">Login</h2>
        <div class="mb-4 relative">
          <label for="email" class="sr-only">Email</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-envelope"></i></span>
          <input type="email" name="email" id="email" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner" placeholder="Put your email" value="">
        </div>
        <div class="mb-4 relative">
          <label for="password" class="sr-only">Password</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-lock"></i></span>
          <input type="password" name="password" id="password" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner" placeholder="Choose a password" value="">
        </div>
        <div class="mb-4">
          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
          </div>
        </div>
        <button type="submit" class="bg-green-500 font-bold text-white text-xl uppercase p-4 w-full rounded shadow-md">Login</button>
      </form>
    </div>
  </div>
@endsection