@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full py-8 px-20">
      <div class="bg-white w-8/12 p-8 rounded md:w-11/12 lg:w-10/12 xl:w-8/12">
        <h2 class="text-lg font-bold text-center pb-4">Submit a Recipe</h2>
        <form action="{{ route('post.edit',$post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="flex items-center space-x-4 p-6 border-t">
            <label for="title" class="shrink w-2/12">Recipe Title</label>
            <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2 @error('title') border-red-500 @enderror" placeholder="What do you call this recipe?" value="{{ $post->title }}">
          </div>
          @error('title')
            <div class="text-red-500 text-center px-6">
              {{ $message }}
            </div>
          @enderror
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <label for="description" class="shrink w-2/12">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2 @error('description') border-red-500 @enderror">{{ $post->description }}</textarea>
          </div>
          @error('description')
            <div class="text-red-500 text-center px-6">
              {{ $message }}
            </div>
          @enderror
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <label for="image" class="shrink w-2/12">Image</label>
            <div class="w-10/12 flex flex-col space-y-2">
              <input type="file" accept="image/*" name="image" id="image" class="bg-gray-100 border-2 rounded py-1 px-2 @error('image') border-red-500 @enderror">
              <div class="pl-2 text-slate-500">
                <div>Maximum size:</div>
                <div>Max file size:</div>
              </div>
            </div>
          </div>
          @error('image')
            <div class="text-red-500 text-center px-6">
              {{ $message }}
            </div>
          @enderror
          <div class="flex items-center space-x-4 mt-4 p-6 border-t">
            <label for="video" class="shrink w-2/12">Video URL</label>
            <input type="url" name="video_url" id="video_url" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2" placeholder="For example: https://www.youtube.com/watch?v=2kl3Liy5jcQ" value="">
          </div>
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <label for="category" class="shrink w-2/12">Category</label>
            <div class="w-10/12 grid grid-rows-4 grid-flow-col gap-4">
              @foreach ($categories as $category)
                <div class="flex items-center mr-4">
                  <input id="category-{{ $loop->index }}" name="categories[{{ $loop->index }}]" type="checkbox" {{ ($post->category_id && in_array($category->id, $post->category_id)) ? 'checked' : '' }} value="{{ $category->id }}" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                  <label for="category-{{ $loop->index }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ $category->section }} </label>
                </div>
              @endforeach
            </div>
          </div>
          @error('categories')
            <div class="text-red-500 text-center px-6">
              {{ $message }}
            </div>
          @enderror
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <p class="shrink w-2/12">Flavour</p>
            <div class="w-10/12 grid grid-rows-4 grid-flow-col gap-4">
              <div class="flex items-center mr-4">
                <input id="flavour-1" name="flavours[0]" type="checkbox" {{ (($post->flavours) && (in_array("sweet", $post->flavours)) ? 'checked' : '') }} value="sweet" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                <label for="flavour-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sweet</label>
              </div>
              <div class="flex items-center mr-4">
                <input id="flavour-2" name="flavours[1]" type="checkbox" {{ (($post->flavours) && in_array("spicy", $post->flavours)) ? 'checked' : '' }} value="spicy" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                <label for="flavour-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spicy</label>
              </div>
            </div>
          </div>
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <p class="shrink w-2/12">Ingredients</p>
            <div class="w-10/12 px-2">
              <div id="ingredient-wrapper">
                <table class="table-auto" id="dynamic_field"> 
                  @foreach ($ingredients as $ingredient)
                  <tr>  
                    <td><input type="text" name="ingredients[0][name]" placeholder="Ingredient name" class="border-2 p-1 mr-2 mb-2 rounded-md" value="{{ json_decode($ingredient)->name }}"/></td>  
                    <td><input type="text" name="ingredients[0][amount]" placeholder="Amount" class="border-2 p-1 mb-2 rounded-md" value="{{ json_decode($ingredient)->amount }}"/></td>
                  </tr>
                  @endforeach
                </table>  
              </div>
              <button id="add" type="button" class="mt-4 bg-blue-200 rounded py-2 px-4">Add ingredient</button>
            </div>
          </div>
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <label for="directions" class="shrink w-2/12">Directions</label>
            <div class="w-10/12">
              <x-forms.tinymce-editor :value="$post->directions"/>
            </div>
          </div>
          <div class="flex items-center space-x-4 mt-4 p-6 border-t">
            <label for="prep-time" class="shrink w-2/12">Preparation time</label>
            <input type="number" min="1" name="preparation_time" id="prep-time" class="bg-gray-100 border-2 rounded py-1 px-2" placeholder="in minutes (optional)" value="{{ $post->preparation_time }}">
          </div>
          <div class="flex items-center space-x-4 mt-4 p-6 border-t">
            <label for="cook-time" class="shrink w-2/12">Cooking time</label>
            <input type="number" min="1" name="cooking_time" id="cook-time" class="bg-gray-100 border-2 rounded py-1 px-2" placeholder="in minutes (optional)" value="{{ $post->cooking_time }}">
          </div>
          <div class="flex items-start space-x-4 mt-4 p-6 border-t">
            <p class="shrink w-2/12">Skill level</p>
            <div>
              <div class="flex items-center mb-4">
                <input id="skill-level-1" type="radio" value="easy" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                <label for="skill-level-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Easy</label>
              </div>
              <div class="flex items-center mb-4">
                  <input id="skill-level-2" type="radio" value="medium" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="skill-level-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Medium</label>
              </div>
              <div class="flex items-center">
                <input id="skill-level-3" type="radio" value="hard" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="skill-level-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hard</label>
            </div>
            </div>
          </div>
          <div>
            <button type="button" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Save Draft</button>
            <button type="submit" class="focus:outline-none text-black bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Update recipe</button>
          </div>
        </form>
      </div>
    </div>
@endsection