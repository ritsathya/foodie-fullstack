@props(['directions'])

<div class="mt-8">
  <h3 class="underline space-x-2 text-center font-semibold text-xl mb-3"><i class="fas fa-mortar-pestle"></i><span>Steps:</span></h3>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div>
      @if ($directions)
        @foreach ($directions as $direction)
        <div class="flex justify-start space-x-4 mb-4 p-4">
          <div class="shrink-0 flex justify-center items-center w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500">
            {{ $loop->index+1}}
          </div>
          <div class="text-left">
          {{ strip_tags($direction) }}
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</div>