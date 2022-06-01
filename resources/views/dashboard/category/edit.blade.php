@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-boxes"></i>
    <span class="ml-1">Category</span>
  </div>
  <div class="w-full mt-4 shadow-md">
    <div class="flex justify-between items-center p-4 bg-gray-100 border-b rounded-t-lg">
      <h2>Add category</h2>
      <a
        href="{{ route('dashboard.category') }}"
        data-mdb-ripple="true"
        data-mdb-ripple-color="light"
        class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
        >Go back</a>
    </div>
    <div>
      <form action="{{ route('dashboard.category.update', $category->id) }}" method="POST" class="p-4">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center justify-center mt-4">
          <div class="mb-3 w-6/12 xl:w-4/12">
            <label for="section" class="form-label inline-block mb-2 mr-2 text-gray-700"
              >Name</label
            >
            <input
              type="text"
              class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                @error('section') border-red-500 @enderror
              "
              name="section"
              id="section"
              placeholder="Category name"
              value="{{ $category->section }}"
            />

            @error('section')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button
            type="submit"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
            class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
          >Update category</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection