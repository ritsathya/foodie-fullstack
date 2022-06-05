@props(['comment'])

<div>
  <button type="button" data-modal-toggle="edit-modal" class="fas fa-edit"></button>

  <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-modal"><i class="fas fa-times"></i></button>
        <div class="py-6 px-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-gray-900">Edit your comment</h3>
          <form class="space-y-6" method="POST" action="{{ route('comment.update', $comment) }}">
              @csrf
              @method('PUT')
              <div>
                <p class="text-center text-xl font-semibold">Edit the rating star</p>
                <div class="rating-css">
                  <div class="star-icon">
                    <input type="radio" value="1" name="rating_star" checked id="rating1">
                    <label for="rating1" class="fas fa-star"></label>
                    <input type="radio" value="2" name="rating_star" id="rating2">
                    <label for="rating2" class="fas fa-star"></label>
                    <input type="radio" value="3" name="rating_star" id="rating3">
                    <label for="rating3" class="fas fa-star"></label>
                    <input type="radio" value="4" name="rating_star" id="rating4">
                    <label for="rating4" class="fas fa-star"></label>
                    <input type="radio" value="5" name="rating_star" id="rating5">
                    <label for="rating5" class="fas fa-star"></label>
                  </div>
                </div>
              </div>
              <textarea name="body" id="text" cols="30" rows="10" class="w-full border-2 p-2 rounded" required>{{ $comment->body}}</textarea>
              <div>
                <button type="button" data-modal-toggle="edit-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
                <button type="submit" data-modal-toggle="edit-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>