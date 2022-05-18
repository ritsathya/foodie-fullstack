@extends('layouts.app')

@section('content')
  <div class="flex justify-center w-full">
    <div class="bg-white p-8 mt-[100px] rounded-lg shadow-xl w-4/12 sm:w-8/12 md:w-6/12">
      <form action="">
        <h2 class="font-medium leading-tight text-center text-4xl mt-0 mb-4">Forgot Password</h2>
        <div class="mb-4 relative">
          <label for="inputEmail" class="sr-only">Email or Username</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-envelope"></i></span>
          <input type="text" name="inputEmail" id="inputEmail" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner" placeholder="Put your email or username" value="">
        </div>
        <button type="submit" class="bg-green-500 font-bold text-white text-xl uppercase p-4 w-full rounded shadow-md mb-4">Send reset link</button>
        <div class="flex justify-center w-full">
          <span>
            Back to <a href="{{ route('auth.login') }}" class="text-blue-500 hover:underline">login</a>
          </span>
        </div>
      </form>
    </div>
  </div>
@endsection