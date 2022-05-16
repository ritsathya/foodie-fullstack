@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full">
      <div class="bg-white w-4/12 rounded-lg p-8 mt-4 shadow-lg">
        <h2 class="font-bold text-center text-2xl mt-0 mb-8">Add Recipe</h2>
        <form action="">
          <div class="flex flex-col mb-4">
            <label for="title" class="text-lg mb-2">Recipe Title</label>
            <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-6/12 p-2 rounded-lg shadow-inner" placeholder="Give your recipe a title" value="">
          </div>
          <div class="flex flex-col mb-4">
            <label for="recipe_img" class="text-lg mb-2">Upload file</label>
            <input name="recipe_img" id="recipe_img" type="file" class="bg-gray-100 border-2 w-6/12 p-2 rounded-lg shadow-inner">
          </div>
          <div class="flex flex-col mb-4">
            <label for="description" class="text-lg mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="bg-gray-100 border-2 p-2 w-full resize-y rounded-md shadow-inner" placeholder="Share the story behind your recipe and what makes it special."></textarea>
          </div>
          <h2 class="font-bold text-2xl mb-8">Ingredients</h2>
          <h2 class="font-bold text-2xl mb-8">Direction</h2>
          <button type="submit" class="bg-orange-700 text-white p-4 rounded-lg shadow-md">Submit Recipe</button>
        </form>
      </div>
    </div>
@endsection