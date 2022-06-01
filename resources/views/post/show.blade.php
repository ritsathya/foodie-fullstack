@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
      <div class="bg-white border-2 w-6/12 rounded-lg py-4 px-8 mt-8">
        <a href="/post/#{{ $post->id }}" class="block mb-4"><i class="fas fa-angle-left"></i> back</a>
        <x-posts.post-header :post="$post" />
        <x-posts.brief-info :post="$post" :ingredients="$ingredients" />
        <x-posts.ingredient :ingredients="$ingredients"/>
        <x-posts.direction :directions="$directions"/>

        <div class="flex justify-start space-x-2 p-4 mt-4">
          <div class="shrink-0 w-6/12">
            <div class="flex items-center mb-3">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <p class="ml-2 text-sm font-medium text-gray-900">4.95 out of 5</p>
            </div>
            <p class="text-sm font-medium text-gray-500">1,745 global ratings</p>
            <div class="flex items-center mt-4">
              <span class="text-sm font-medium text-blue-600">5 <i class="fas fa-star text-yellow-400"></i></span>
              <div class="w-2/4 h-3 mx-4 bg-gray-200 rounded-full">
                <div class="h-3 bg-yellow-400 rounded-full" style="width: 70%"></div>
              </div>
              <span class="text-sm font-medium text-blue-600">70%</span>
            </div>
            <div class="flex items-center mt-4">
              <span class="text-sm font-medium text-blue-600">4 <i class="fas fa-star text-yellow-400"></i></span>
              <div class="w-2/4 h-3 mx-4 bg-gray-200 rounded-full">
                <div class="h-3 bg-yellow-400 rounded-full" style="width: 17%"></div>
              </div>
              <span class="text-sm font-medium text-blue-600">17%</span>
            </div>
            <div class="flex items-center mt-4">
              <span class="text-sm font-medium text-blue-600">3 <i class="fas fa-star text-yellow-400"></i></span>
              <div class="w-2/4 h-3 mx-4 bg-gray-200 rounded-full">
                <div class="h-3 bg-yellow-400 rounded-full" style="width: 8%"></div>
              </div>
              <span class="text-sm font-medium text-blue-600">8%</span>
            </div>
            <div class="flex items-center mt-4">
              <span class="text-sm font-medium text-blue-600">2 <i class="fas fa-star text-yellow-400"></i></span>
              <div class="w-2/4 h-3 mx-4 bg-gray-200 rounded-full">
                <div class="h-3 bg-yellow-400 rounded-full" style="width: 4%"></div>
              </div>
              <span class="text-sm font-medium text-blue-600">4%</span>
            </div>
            <div class="flex items-center mt-4">
              <span class="text-sm font-medium text-blue-600">1 <i class="fas fa-star text-yellow-400 ml-1"></i></span>
              <div class="w-2/4 h-3 mx-4 bg-gray-200 rounded-full">
                <div class="h-3 bg-yellow-400 rounded-full" style="width: 2%"></div>
              </div>
              <span class="text-sm font-medium text-blue-600">1%</span>
            </div>
            <div class="mt-8 w-6/12">
              <a href="#reivew" class="px-4 py-2 bg-gray-200 rounded-md shadow-md w-full">
                Write your review
              </a>
            </div>
          </div>
          <div id="commentSection">
            <div class="mb-4">
              <div class="flex items-center mb-4 space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                <div class="space-y-1 font-medium">
                    <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500">Joined on August 2014</time></p>
                </div>
              </div>
              <div class="flex items-center mb-1">
                <div class="text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
            </div>
            <div class="mb-4">
              <div class="flex items-center mb-4 space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                <div class="space-y-1 font-medium">
                    <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500">Joined on August 2014</time></p>
                </div>
              </div>
              <div class="flex items-center mb-1">
                <div class="text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
            </div>
            <div class="mb-4">
              <div class="flex items-center mb-4 space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                <div class="space-y-1 font-medium">
                    <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500">Joined on August 2014</time></p>
                </div>
              </div>
              <div class="flex items-center mb-1">
                <div class="text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
            </div>
            <div class="mb-4">
              <div class="flex items-center mb-4 space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                <div class="space-y-1 font-medium">
                    <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500">Joined on August 2014</time></p>
                </div>
              </div>
              <div class="flex items-center mb-1">
                <div class="text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection