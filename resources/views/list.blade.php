@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
        <div class="bg-white border-2 w-8/12 rounded-lg p-4 mt-4">
            <div class="container px-6 py-8 mx-auto">
                <div class="lg:flex lg:-mx-2">
                    <div class="grid grid-cols-5 gap-5">
                        @foreach ($categories as $category)
                            <div class="px-10 py-5">
                                <form action="{{ route('list-by-category', $category) }}" method="POST">
                                    @csrf
                                    {{-- style this for me XD --}}
                                    <button type="submit">{{ $category->section }}</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


