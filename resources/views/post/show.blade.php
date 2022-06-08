@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
      <div class="bg-white border-2 w-6/12 rounded-lg py-4 px-8 mt-8 md:w-8/12 xl:w-6/12">
        <a href="{{ URL::route('post') }}" class="block mb-4"><i class="fas fa-angle-left"></i> back</a>
        <x-posts.post-header :post="$post" />
        <x-posts.brief-info :post="$post" :ingredients="$ingredients" />
        <x-posts.ingredient :ingredients="$ingredients"/>
        <x-posts.direction :directions="$directions"/>
        @foreach ($comments as $comment)
          @if (Auth::check())
            @if ($comment->user->id == auth()->user()->id)
              @php
                $have_user = 0
              @endphp
            @endif
          @endif
        @endforeach

        @if ($comments->isEmpty() || !isset($have_user))
          <div class="bg-white p-8 mt-8 rounded shadow">
            <form action="{{ route('comment.create', $post->id) }}" method="POST" class="flex flex-col items-center space-y-4">
              @csrf
              <div>
                <p class="text-center text-xl font-semibold">Rate this post</p>
                <div class="rating-css">
                  <div class="star-icon">
                    @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" value="{{$i}}" name="rating_star" {{ $i == 1? 'checked' : ''}} id="rating{{$i}}">
                    <label for="rating{{$i}}" class="fas fa-star"></label>
                    @endfor
                  </div>
                </div>
              </div>
              <textarea name="body" id="review" cols="30" rows="5" class="border-2 p-2 w-full rounded" required></textarea>
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit Review</button>
            </form>
          </div>
        @endif

        @foreach ($comments as $comment)
          <x-comment :comment="$comment" :replied_comments="$replied_comments" />
        @endforeach

      </div>
    </div>
@endsection