@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full py-8 px-20">
      <div class="bg-white w-8/12 p-8 rounded md:w-11/12 lg:w-10/12 xl:w-8/12">
        <h2 class="text-lg font-bold text-center border-b pb-4">Submit a Recipe</h2>
        <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="flex items-center space-x-4 mb-4 p-6 border-b">
            <label for="title" class="shrink w-2/12">Recipe Title</label>
            <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2" placeholder="What do you call this recipe?" value="" required>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <label for="description" class="shrink w-2/12">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2" required></textarea>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <label for="image" class="shrink w-2/12">Image</label>
            <div class="w-10/12 flex flex-col space-y-2">
              <input type="file" accept="image/*" name="image" id="image" class="bg-gray-100 border-2 rounded py-1 px-2" required>
              <div class="pl-2 text-slate-500">
                <div>Maximum size:</div>
                <div>Max file size:</div>
              </div>
            </div>
          </div>
          <div class="flex items-center space-x-4 mb-4 p-6 border-b">
            <label for="video" class="shrink w-2/12">Video URL</label>
            <input type="url" name="video" id="video" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2" placeholder="For example: https://www.youtube.com/watch?v=2kl3Liy5jcQ" value="">
          </div>
          <div class="flex items-center space-x-4 mb-4 p-6 border-b">
            <label for="category" class="shrink w-2/12">Category</label>
            <select name="category" id="category" class="bg-gray-100 border-2 w-10/12 rounded py-1 px-2" required>
              <option value="" disabled selected>Select category for your recipe</option>
              
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->section }}</option>
              @endforeach
              
            </select>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <p class="shrink w-2/12">Flavour</p>
            <div class="w-10/12 space-y-4 py-1 px-2">
              <div class="flex items-center mr-4">
                <input checked id="flavour-1" name="flavours[0]" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                <label for="flavour-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sweet</label>
              </div>
              <div class="flex items-center mr-4">
                <input checked id="flavour-2" name="flavours[1]" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                <label for="flavour-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spicy</label>
              </div>
            </div>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <p class="shrink w-2/12">Ingredients</p>
            <div class="w-10/12 px-2">
              <div id="ingredient-wrapper">
                <table class="table-auto" id="dynamic_field"> 
                  <tr>  
                    <td><input type="text" name="ingredients[0][name]" placeholder="Ingredient name" class="border-2 p-1 mr-2 mb-2 rounded-md" required/></td>  
                    <td><input type="text" name="ingredients[0][amount]" placeholder="Amount" class="border-2 p-1 mb-2 rounded-md" required/></td>  
                  </tr>  
                </table>  
              </div>
              <button id="add" type="button" class="mt-4 bg-blue-200 rounded py-2 px-4">Add ingredient</button>
            </div>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <label for="directions" class="shrink w-2/12">Directions</label>
            <div class="w-10/12">
              <x-forms.tinymce-editor/>
            </div>
          </div>
          <div class="flex items-start space-x-4 mb-4 p-6 border-b">
            <p class="shrink w-2/12">Skill level</p>
            <div>
              <div class="flex items-center mb-4">
                <input id="skill-level-1" type="radio" value="" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="skill-level-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Easy</label>
              </div>
              <div class="flex items-center mb-4">
                  <input checked id="skill-level-2" type="radio" value="" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="skill-level-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Medium</label>
              </div>
              <div class="flex items-center">
                <input checked id="skill-level-3" type="radio" value="" name="skill-level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="skill-level-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hard</label>
            </div>
            </div>
          </div>
          <div>
            <button type="button" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Save Draft</button>
            <button type="submit" class="focus:outline-none text-black bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Submit recipe</button>
          </div>
        </form>
      </div>
    </div>
@endsection