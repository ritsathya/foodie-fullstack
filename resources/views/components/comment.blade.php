@props(['comment'])

<div class="p-4 mt-4">
    <div class="mb-2">
      <div class="flex items-start mb-4 space-x-4">
        <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
        <div class="space-y-1 font-medium">
            <p>{{ $comment->user->name }}</p>
            <span class="text-sm text-slate-500">{{ ($comment->status == 'new') ? $comment->created_at->diffForHumans() : $comment->updated_at->diffForHumans() }}</span>
        </div>
        <div>
          <button type="button" data-modal-toggle="edit-model-{{ $comment->id }}" class="fas fa-edit"></button>

          <div id="edit-model-{{ $comment->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
              <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-model-{{ $comment->id }}"><i class="fas fa-times"></i></button>
                <div class="py-6 px-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900">Edit your comment</h3>
                  <form class="space-y-6" action="#">
                    @csrf
                    <div>
                      <p class="text-center text-xl font-semibold">Rate this post</p>
                      <div class="rating-css">
                        <div class="star-icon">
                            @for ($i = 1; $i <= 5; $i++)
                              <input type="radio" value="{{$i}}" name="rating_star" id="rating{{$i+$comment->id}}">
                              <label for="rating{{$i+$comment->id}}" class="fas fa-star"></label>
                            @endfor
                        </div>
                      </div>
                    </div>
                    <textarea name="text" id="text" cols="30" rows="10" class="w-full border-2 p-2 rounded">{{ $comment->body}}</textarea>
                    <div>
                      <button type="button" data-modal-toggle="edit-model-{{ $comment->id }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
                      <button type="button" data-modal-toggle="edit-model-{{ $comment->id }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</button>
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
        <div class="text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
              @if ($i < $comment->rating_star)
                <i class="fas fa-star text-yellow-400"></i>
              @else
              <i class="fas fa-star text-gray-500"></i>
              @endif
          @endfor
        </div>
        <h3 class="ml-2 text-sm font-semibold text-gray-900">{{ $comment->body }}</h3>
      </div>
    </div>
    <div>
      <button type="button" data-modal-toggle="reply-model-{{ $comment->id }}" class="bg-gray-200 px-2 py-1 rounded">Reply</button>
      <div id="reply-model-{{ $comment->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
          <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="reply-model-{{ $comment->id }}"><i class="fas fa-times"></i></button>
            <div class="py-6 px-6 lg:px-8">
              <h3 class="mb-4 text-xl font-medium text-gray-900">Reply this comment</h3>
              <form class="space-y-6" action="#">
                @csrf
                <p>> {{ $comment->body}}</p>
                <textarea name="text" id="text" cols="30" rows="10" class="w-full border-2 p-2 rounded"></textarea>
                <div>
                  <button type="button" data-modal-toggle="reply-model-{{ $comment->id }}" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
                  <button type="button" data-modal-toggle="reply-model-{{ $comment->id }}" class="text-white bg-green-700 hover:bg-green-800font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Reply</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>