@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-boxes"></i>
    <span class="ml-1">Category</span>
  </div>

  @if (Session::has('message'))
      
  <div class="p-4 mt-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium">Success alert!</span> {{Session::get('message')}}
  </div>
  @endif

  <div class="w-full mt-4 shadow-md">
    <div class="flex justify-between items-center p-4 bg-gray-100 border-b rounded-t-lg">
      <h2>All categories</h2>
      <a
        href="{{ route('dashboard.category.add') }}"
        data-mdb-ripple="true"
        data-mdb-ripple-color="light"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >Add category</a>
    </div>
      <table class="table-auto bg-white w-full">
        <thead class="border-b">
          <tr>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">#</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Name</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Created at</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Updated at</th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
          </tr>
        </thead>
        <tbody>        
          <tr>
            <th class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
              No
            </th>
            <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
              Name
            </td>
            <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
              date
            </td>
            <td class="text-sm font-normal text-gray-900 px-6 py-4 text-center">
              date
            </td>
            <td>
              <div class="flex justify-center space-x-4">
                <form action="" method="POST">
                  @csrf
                  @method('PUT')
                  <button type="submit">Edit</button>
                </form>
                <form action="" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Delete</button>
                </form>
            </div>

            </td>
          </tr>
        </tbody>
  </div>
  <div class="mt-2">
    {{-- {{ $categories->links() }} --}}
  </div>
</div>
@endsection