@extends('layouts.dashboard')

@section('content')
<div class="w-full p-4">
  <div class="text-2xl bg-white w-full p-4 rounded">
    <i class="fas fa-pager"></i>
    <span class="ml-1">Dashboard</span>
  </div>
  <div class="bg-white p-4 mt-4 rounded">
    <ul>
    @foreach ($reports as $report)
      <li class="bg-gray-300 mb-3 p-4 rounded flex justify-between">
        <div class="flex space-x-4 items-center">
          <i class="fas fa-exclamation-circle text-2xl"></i>
          <div>
            <h5 class="font-semibold text-lg">{{ App\Models\Post::find($report->post_id)->title }} <span class="text-sm text-gray-600">reported by {{ App\Models\User::find($report->user_id)->name}}</span></h5>
            <p>{{ $report->body}}</p>
          </div>
        </div>
        <form action="{{ route('report.destroy', $report->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button><i class="fas fa-minus"></i></button>
        </form>
      </li>
    @endforeach
    </ul>
  </div>
</div>
@endsection