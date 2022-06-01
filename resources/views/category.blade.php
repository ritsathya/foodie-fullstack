@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
        <div class="bg-white border-2 w-8/12 rounded-lg p-4 mt-4">


            <div class="container px-6 py-8 mx-auto">
                <div class="lg:flex lg:-mx-2">
                    <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Breakfast</a>
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Lunch</a>
                        <a href="#" class="block font-medium text-blue-600 dark:text-blue-500 hover:underline">Dinner</a>
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Desserts</a>
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Snack</a>
                    </div>

                    <div class="grid grid-cols-4 gap-4">

                        {{-- @if ()
                            <x-post>
                        @endif --}}

                        {{-- test preview --}}
                        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md flex flex-col items-between">
                            <a href="#">
                                <img class="rounded-t-lg object-fill max-w-full row-2" src="/img/profile-pic.png" alt="" />
                            </a>
                            <div class="p-5 ">
                                <a href="#" class="flex">
                                    <img class="mb-3 mr-3 w-8 h-8 rounded-full shadow-lg" src="/img/profile-pic.png" alt=""/>
                                    <p class="mb-2 capitalize text-lg font-bold tracking-tight text-gray-900">Ramson Gorday</p>
                                </a>
                                <p class="mb-3 font-normal text-gray-700">Here are the biggest description ever given to a post smh.</p>
                            </div>
                        </div>

                        

                            </x-category-post :post="$post">

                    </div>
                </div>
            </div>       
        </div>
    </div>
@endsection


