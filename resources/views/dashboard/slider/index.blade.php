@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-map"></i>
    <span class="ml-1">Slider</span>
  </div>
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
                {{ $slide->id }}
              </th>
              <td class="w-40 p-2">
                <img src="{{ url('Images/'.$slide->image) }}" class="w-40 h-24 rounded-lg">
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $slide->title }}
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $slide->status == 1 ? 'active' : 'inactive' }}
              </td>
              <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
                {{ $slide->created_at->diffForHumans() }}
              </td>
              <td>
                <form action="/dashboard/slider/{{ $slide->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="bg-white p-4 text-center text-xl">Slide is empty!</div>
    @endif        
  </div>
</div>
@endsection