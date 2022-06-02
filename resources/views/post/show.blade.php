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
                    <p>Jese Leos</p>
                </div>
                <div>
                  <button type="button" data-modal-toggle="edit-modal" class="fas fa-edit"></button>

                  <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-modal"><i class="fas fa-times"></i></button>
                        <div class="py-6 px-6 lg:px-8">
                          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit your comment</h3>
                          <form class="space-y-6" action="#">
                            @csrf
                            <textarea name="text" id="text" cols="30" rows="10" class="w-full border-2 p-2 rounded"></textarea>
                            <div>
                              <button type="button" data-modal-toggle="edit-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
                              <button type="button" data-modal-toggle="edit-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form action="#" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash"></i></button>
                  </form>
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