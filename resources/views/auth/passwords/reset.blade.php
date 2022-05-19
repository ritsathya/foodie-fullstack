@extends('layouts.app')

@section('content')
  <div class="flex justify-center w-full">
    <div class="bg-white p-8 mt-[100px] rounded-lg shadow-xl w-4/12 sm:w-8/12 md:w-6/12">
      <h2 class="font-medium leading-tight text-center text-4xl mt-0 mb-4">Reset Password</h2>
      <form method="POST" action="{{ route('password.update') }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-4 relative">
          <label for="email" class="sr-only">Email</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-envelope"></i></span>
          <input id="email" type="email" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
          
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>
        <div class="mb-4 relative">
          <label for="password" class="sr-only">Password</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-lock"></i></span>
          <input id="password" type="password" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner @error('password') is-invalid @enderror" placeholder="Choose a password" name="password" required autocomplete="new-password">
          
          @error('password')
              <span role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        
        </div>
        <div class="mb-4 relative">
          <label for="password_confirmation" class="sr-only">Password confirmation</label>
          <span class="pointer-events-none w-8 text-gray-500 absolute top-1/2 transform -translate-y-1/2 left-3"><i class="fas fa-lock"></i></span>
          <input id="password-confirm" type="password" class="bg-gray-100 w-full py-4 pl-8 border-2 rounded-lg shadow-inner" name="password_confirmation" placeholder="Enter the password again" required autocomplete="new-password">
          
        </div>
        <button type="submit" class="bg-green-500 font-bold text-white text-xl uppercase p-4 w-full rounded shadow-md mb-4">Reset Password</button>
      </form>
    </div>
  </div>
@endsection