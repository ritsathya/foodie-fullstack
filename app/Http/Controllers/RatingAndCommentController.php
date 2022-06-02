<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\RatingAndComment;
use Illuminate\Http\Request;

class RatingAndCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'body' => 'required|string',
            'rating_star' => 'required|integer',
        ]);
        RatingAndComment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
            'body' => $request->body,
            'rating_star' => $request->rating_star,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RatingAndComment::destroy($id);
    }
}
