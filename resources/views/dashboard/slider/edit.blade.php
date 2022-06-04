@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-map"></i>
    <span class="ml-1">Slider</span>
  </div>
  <div class="w-full mt-4 shadow-md">
    <div class="flex justify-between items-center p-4 bg-gray-100 border-b rounded-t-lg">
      <h2>Edit slide</h2>
      <a
        href="{{ route('dashboard.slider') }}"
        data-mdb-ripple="true"
        data-mdb-ripple-color="light"
        class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
        >Go back</a>
    </div>
    <div>
      <form action="{{ route('dashboard.slider.update', $slide->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf
        <div class="flex flex-col items-center justify-center mt-4">
          <div class="mb-3 w-6/12 xl:w-4/12">
            <label for="title" class="form-label inline-block mb-2 mr-2 text-gray-700"
              >Title</label
            >
            <input
              type="text"
              class="
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                border border-solid border-gray-300
                rounded
                @error('title') border-red-500 @enderror
              "
              name="title"
              id="title"
              placeholder="Text input"
              value="{{ $slide->title }}"
            />

            @error('title')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3 w-6/12 xl:w-4/12 flex flex-col items-center justify-center">
            <img src="{{ asset('storage/slides/'.$slide->image) }}" class="w-80 h-48 rounded-lg">
            <label for="image" class="inline-block p-2 m-2 bg-gray-600 text-gray-50 rounded @error('image') border-red-500 @enderror">Change Image</label>
            <input class="hidden" type="file" accept="image/*" name="image" id="image">
            @error('image')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3 w-6/12 xl:w-4/12">
            <label for="status">Status</label>
            <select class="
              w-full
              px-3
              py-1.5
              text-gray-700
              bg-white bg-clip-padding bg-no-repeat
              border border-solid border-gray-300
              rounded
              @error('status') border-red-500 @enderror" name="status" id="status">
                <option value="{{ $slide->status }}" selected>{{ $slide->status == 1 ? 'active' : 'inactive' }}</option>
                <option value="{{ $slide->status ? 0:1 }}">{{ $slide->status == 1 ? 'inactive' : 'active' }}</option>
            </select>
            @error('status')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button
            type="submit"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
            class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg active:bg-green-800 active:shadow-lg"
          >Update slide</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection