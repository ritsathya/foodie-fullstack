@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-map"></i>
    <span class="ml-1">Slider</span>
  </div>

  @if (Session::has('message'))
      
  <div class="p-4 mt-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium">Success alert!</span> {{Session::get('message')}}
  </div>
  @endif

  <div class="w-full mt-4 shadow-md">
    <div class="flex justify-between items-center p-4 bg-gray-100 border-b rounded-t-lg">
      <h2>All slides</h2>
      <a
        href="{{ route('dashboard.slider.add') }}"
        data-mdb-ripple="true"
        data-mdb-ripple-color="light"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >Add slide</a>
    </div>
    @if ($slides->count())
      <table class="table-auto bg-white w-full">
        <thead class="border-b">
          <tr>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">#</th>
            <th class="text-sm font-medium text-gray-900 px-2 py-4 text-center">Image</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Title</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Status</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Created at</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
          </tr>
        </thead>
        <tbody>        
          @foreach ($slides as $slide)
            <tr>
              <th class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $loop->index+1 }}
              </th>
              <td class="w-40 p-2">
                <img src="{{ asset('storage/slides/'.$slide->image) }}" class="w-40 h-24 rounded-lg">
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $slide->title }}
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                @if ($slide->status)
                  <div class="text-green-500 uppercase font-semibold">active</div>
                @else
                  <div class="text-yellow-500 uppercase font-semibold">inactive</div>
                @endif
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $slide->created_at->diffForHumans() }}
              </td>
              <td>
                <div class="flex space-x-4 items-center justify-center">
                  <div>
                    <a href="{{ route('dashboard.slider.edit', $slide->id) }}" class="p-2 bg-yellow-500 rounded space-x-2"><span>Edit</span><i class="fas fa-edit"></i></a>
                  </div>
                  <form action="/dashboard/slider/{{ $slide->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit" class="p-2 bg-red-500 rounded space-x-2"><span>Delete</span><i class="fas fa-trash-alt"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="bg-white p-4 text-center text-xl">Slide is empty!</div>
    @endif        
  </div>
  <div class="mt-2">
    {{ $slides->links() }}
  </div>
</div>
@endsection