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
        return view('post.index');
    }

    public function create()
    {
        $categories = Category::get();
        $i = 0;
        return view('post.create', [
            'categories' => $categories, 
            'i' => $i,
        ]);
    }

    public function store(Request $request)
    {
        $fields=$request->validate([
            'token'=>'required|string',
            'description'=>'required|string',
            'image_url'=>'required|image|mimes:jpeg,png,jpg,gif,svg|',
            'video_url'=>'required|string',
            'category_id'=>'required|array',
            'flavours'=>'required|array',
            'ingredients'=>'required|array',
            'ingredients.*.name' => 'required|max:255',
            'ingredients.*.amount' => 'required|max:255',
            'directions'=>'required|string',
        ]);

        $path=$request->file(key:'image')->store(path:'images',options:'s3');
        $image_url = Storage::disk('s3')->url($path);
        $categories = array_map('intval',$request->categories);
        $ingredients = $request->ingredients;

        for ($i=0; $i < sizeof($request->ingredients); $i++) { 
            $ingredients[$i] = json_encode($ingredients[$i]);
        }

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $image_url,
            'video_url' => $request->video_url,
            'category_id' => $categories,
            'flavours' => $request->flavours,
            'ingredients' => json_encode($ingredients),
            'directions' => $request->directions,
            'preparation_time' => $request->preparation_time,
            'cooking_time' => $request->cooking_time,
        ]);
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

    public function update(Request $request, $id)
    {
        // $fields=$request->validate([
        //     'token'=>'required|string',
        //     'description'=>'required|string',
        //     'image_url'=>'required|image|mimes:jpeg,png,jpg,gif,svg|',
        //     'video_url'=>'required|string',
        //     'category_id'=>'required|array',
        //     'flavours'=>'required|array',
        //     'ingredients'=>'required|array',
        //     'ingredients.*.name' => 'required|max:255',
        //     'ingredients.*.amount' => 'required|max:255',
        //     'directions'=>'required|string',
        // ]);

        $post = Post::find($id);

        if(!auth()){
            return redirect('login');
        }
        if(auth()->id != $post->user->id){
            return ("u can't update, u're not the owner!!");
        }

        $path=$request->file(key:'image')->store(path:'images',options:'s3');
        $image_url = Storage::disk('s3')->url($path);
        $categories = array_map('intval',$request->categories);
        $ingredients = $request->ingredients;

        for ($i=0; $i < sizeof($request->ingredients); $i++) { 
            $ingredients[$i] = json_encode($ingredients[$i]);
        }
        $post->update($request->all());

        // $post->update([
        //     'user_id' => auth()->user()->id,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image_url' => $image_url,
        //     'video_url' => $request->video_url,
        //     'category_id' => $categories,
        //     'flavours' => $request->flavours,
        //     'ingredients' => json_encode($ingredients),
        //     'directions' => $request->directions,
        //     'preparation_time' => $request->preparation_time,
        //     'cooking_time' => $request->cooking_time,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(!auth()){
            return redirect('login');
        }

        if(auth()->id != $post->user->id){
            return ("u can't delete, u're not the owner!!");
        }

        Post::destroy($id);
    }
    
}
