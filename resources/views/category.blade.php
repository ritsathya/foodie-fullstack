@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full h-screen">
        <div class="bg-white border-2 w-8/12 h-fit rounded-lg p-4 mt-4">


            <div class="container px-6 py-8 mx-auto">
                <div class="lg:flex lg:-mx-2">
                    <div class="grid grid-cols-4 gap-4">

                        @if ($posts->count())
                            @foreach ($posts as $post)
                                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                                    <a href="#" class="relative">
                                        <div class="absolute top-0 right-0">
                                            {{-- i think we can add if auth()->user->favourited or something fa-solid if not fa-regular --}}
                                            <span><i class="far fa-heart px-4 py-4 text-2xl text-white"></i></span>
                                        </div>

                                        {{-- change src to aws here --}}
                                        <img class="rounded-t-lg object-fill max-w-full h-auto" src="/img/profile-pic.png" alt="" />
                                    </a>
                                    <div class="p-5 ">
                                        <a href="#" class="flex">
                                            {{-- change src to aws here too --}}
                                            <img class="mb-3 mr-3 w-8 h-8 rounded-full shadow-lg" src="/img/profile-pic.png" alt=""/>
                                            <p class="mb-2 capitalize text-lg font-bold tracking-tight text-gray-900">{{ $post->user->name }}</p>
                                        </a>
                                        <p class="mb-2 capitalize text-lg font-bold tracking-tight text-gray-800">{{ $post->title }}</p>
                                        <p class="mb-3 h-24 overflow-hidden font-normal text-gray-700">{{ $post->description }}</p>
                                    </div>
                                    <div class="flex">
                                        {{-- couldnt count, maybe you can figure it out? count for each then loop to add XD --}}
                                        <div class="rounded-lg bg-[#def8e8] border border-solid border-[#13b67d] h-auto w-auto px-1 m-1">
                                            Sweet
                                        </div>
                                        <div class="rounded-lg bg-[#def8e8] border border-solid border-[#13b67d] h-auto w-auto px-1 m-1">
                                            Salty
                                        </div>
                                        <div class="rounded-lg bg-[#def8e8] border border-solid border-[#13b67d] h-auto w-auto px-1 m-1">
                                            Spicy
                                        </div>
                                    </div>
                                    <div class="flex p-5 justify-between">
                                        <div class="flex">
                                            <span><i class="far fa-clock mr-1"></i></span>
                                            <span><p>{{ $post->duration }} mins</p></span>
                                        </div>

                                        <div>
                                            @for ($i = (int)$post->review; $i > 0; $i--)
                                                <span><i class="fas fa-star"></i></span>
                                            @endfor
                                            @for ($i = (5-$post->review); $i > 0; $i--)
                                                <span><i class="far fa-star"></i></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        
                        @else
                            <p>There are no posts.</p> 
                        @endif

                    </div>
                </div>
            </div>       
        </div>
    </div>
@endsection


