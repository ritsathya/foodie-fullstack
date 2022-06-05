@props(['comment', 'replied_comments'])

<div class="p-4 mt-2">
    <div class="mb-2">
      <div class="flex items-start space-x-4">
        <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
        <div class="space-y-1 font-medium">
            <p>{{ $comment->user->name }}</p>
            <span class="text-sm text-slate-500">{{ ($comment->status == 'new') ? $comment->created_at->diffForHumans() : 'updated ' . $comment->updated_at->diffForHumans() }}</span>
        </div>
        @if (auth()->check() && $comment->user->id === auth()->user()->id)
        <div>
          <x-edit-modal :comment="$comment" />
          <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash"></i></button>
          </form>
        </div>
        @endif
      </div>
      <div class="flex flex-col items-start mb-1">
        <div class="text-yellow-400 ml-1">
          @for ($i = 0; $i < 5; $i++)
              @if ($i < $comment->rating_star)
                <i class="fas fa-star text-yellow-400"></i>
              @else
              <i class="fas fa-star text-gray-500"></i>
              @endif
          @endfor
        </div>
        <p class="ml-2 text-sm text-left text-gray-900 p-4 w-full bg-gray-100 rounded">{{ $comment->body }}</p>
      </div>
    </div>

    @foreach ($replied_comments as $replied_comment)
        @if ($replied_comment->rating_and_comment_id === $comment->id)
          @php
            $have_comment = 0;            
          @endphp
          <div class="flex items-start space-x-4 ml-6">
            <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
            <div>
              <h3 class="font-semibold text-gray-900">{{ $replied_comment->user->name }} (Author)</h3>
              <span class="text-sm text-slate-500">{{ $replied_comment->created_at->diffForHumans()}}</span>
            </div>
            <div>
              <x-edit-reply :reply="$replied_comment" />
              <form action="#" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash"></i></button>
              </form>
            </div>
            
          </div>
          <p class="ml-6 mr-1 text-left text-sm p-4 w-90 bg-gray-100 rounded">{{ $replied_comment->body }}</p>
        @endif
    @endforeach

    @if (auth()->check() && !isset($have_comment) && $comment->post->user->id === auth()->user()->id)
      <x-reply :comment="$comment" />
    @endif
</div>