<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
            'categories' => $categories,
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::get();
        $ingredients = (json_decode($post->ingredients));
        return view('post.edit', [
            'categories' => $categories,
            'ingredients' => $ingredients,
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
            'categories'=>'required|array',
            'flavours'=>'required|array',
            'ingredients'=>'required|array',
            'ingredients.*.name' => 'required|max:255',
            'ingredients.*.amount' => 'required|max:255',
            'directions'=>'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $imagePath = 'images/' . $name;
            Storage::disk('s3')->put($imagePath, file_get_contents($file));
        }

        $ingredients = $request->ingredients;
        for ($i=0; $i < sizeof($request->ingredients); $i++) { 
            $ingredients[$i] = json_encode($ingredients[$i]);
        }

        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imagePath,
            'video_url' => $request->video_url,
            'category_id' => array_values($request->categories),
            'flavours' => array_values($request->flavours),
            'ingredients' => json_encode($ingredients),
            'directions' => $request->directions,
            'preparation_time' => $request->preparation_time,
            'cooking_time' => $request->cooking_time,
        ]);

        return redirect()->route('post');
    }
        
    public function show($id)
    {
        // $arr = Post::find(1)->ingredients;
        // $inarr = json_decode($arr, true);

        // for ($i=0; $i <sizeof($inarr) ; $i++) { 
        //     $inarr[$i] = json_decode($inarr[$i], true);
        // }
        // dd($inarr);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
            'categories'=>'required|array',
            'flavours'=>'required|array',
            'ingredients'=>'required|array',
            'ingredients.*.name' => 'required|max:255',
            'ingredients.*.amount' => 'required|max:255',
            'directions'=>'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $imagePath = 'images/' . $name;
            Storage::disk('s3')->put($imagePath, file_get_contents($file));

            // Remove old image
            if (Storage::disk('s3')->exists(public_path($post->image_url))) {
                Storage::disk('s3')->delete($post->image_url);
            }
        }

        $ingredients = $request->ingredients;
        for ($i=0; $i < sizeof($request->ingredients); $i++) { 
            $ingredients[$i] = json_encode($ingredients[$i]);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imagePath,
            'video_url' => $request->video_url,
            'category_id' => array_values($request->categories),
            'flavours' => array_values($request->flavours),
            'ingredients' => json_encode($ingredients),
            'directions' => $request->directions,
            'preparation_time' => $request->preparation_time,
            'cooking_time' => $request->cooking_time,
        ]);

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('s3')->delete($post->image_url); 
        $post->delete();
        return back();
    }
    
}
