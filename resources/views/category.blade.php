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
                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto my-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">TItle</h4>
                            <p class="text-blue-500">add tags around here maybe?</p>
            
                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <span class="mx-1">View</span>
                            </button>
                        </div>
                        
                    </div>
        
                    
                    

                            
        
                </div>
            </div>
        
        
        </div>
    </div>
@endsection


