@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
      <div class="bg-white border-2 w-6/12 rounded-lg py-4 px-8 mt-8 md:w-8/12 xl:w-6/12">
        <a href="{{ url()->previous() }}" class="block mb-4"><i class="fas fa-angle-left"></i> back</a>
        <x-posts.post-header :post="$post" />
        <x-posts.brief-info :post="$post" :ingredients="$ingredients" />
        <x-posts.ingredient :ingredients="$ingredients"/>
        <x-posts.direction :directions="$directions"/>

        <div class="bg-white p-8 mt-8 rounded shadow">
          <form action="" method="POST" class="flex flex-col items-center space-y-4">
            @csrf
            <div>
              <p class="text-center text-xl font-semibold">Rate this post</p>
              <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="post_rating" checked id="rating1">
                    <label for="rating1" class="fas fa-star"></label>
                    <input type="radio" value="2" name="post_rating" id="rating2">
                    <label for="rating2" class="fas fa-star"></label>
                    <input type="radio" value="3" name="post_rating" id="rating3">
                    <label for="rating3" class="fas fa-star"></label>
                    <input type="radio" value="4" name="post_rating" id="rating4">
                    <label for="rating4" class="fas fa-star"></label>
                    <input type="radio" value="5" name="post_rating" id="rating5">
                    <label for="rating5" class="fas fa-star"></label>
                </div>
            </div>
            </div>
            <textarea name="review" id="review" cols="30" rows="5" class="border-2 p-2 w-full rounded"></textarea>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Submit Review</button>
          </form>
        </div>
        <div class="p-4 mt-4">
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
                <div>
                  <i class="fas fa-star text-yellow-400"></i>
                  <i class="fas fa-star text-gray-500"></i>
                  <i class="fas fa-star text-gray-500"></i>
                  <i class="fas fa-star text-gray-500"></i>
                  <i class="fas fa-star text-gray-500"></i>
                </div>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection