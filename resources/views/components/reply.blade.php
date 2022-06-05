@props(['comment'])

<div>
  <button type="button" data-modal-toggle="reply-model-{{ $comment->id }}" class="bg-gray-200 px-2 py-1 rounded">Reply</button>
  <div id="reply-model-{{ $comment->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="reply-model-{{ $comment->id }}"><i class="fas fa-times"></i></button>
        <div class="py-6 px-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-gray-900">Reply to this comment</h3>
          <form class="space-y-6" action="{{ route('replied.create', ['post'=>$comment->post, 'comment'=>$comment]) }}" method="POST">
            @csrf
            @method('POST')
            <p>> {{ $comment->body}}</p>
            <textarea name="body" id="text" cols="30" rows="10" class="w-full border-2 p-2 rounded"></textarea>
            <div>
              <button type="button" data-modal-toggle="reply-model-{{ $comment->id }}" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
              <button type="submit" data-modal-toggle="reply-model-{{ $comment->id }}" class="text-white bg-green-700 hover:bg-green-800font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Reply</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>