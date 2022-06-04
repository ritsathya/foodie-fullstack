<?php

namespace App\Http\Controllers;

use App\Models\RepliedReview;
use Illuminate\Http\Request;

class RepliedReviewController extends Controller
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
    public function store($post, $comment, Request $request)
    {
        // dd($request, $comment, $post);
        $request->validate([
            'body' => 'required|string',
        ]);

        RepliedReview::create([
            'user_id' => auth()->user()->id,
            'rating_and_comment_id' => $comment,
            'post_id' => $post,
            'body' => $request->body,

            // 'user_id' => $request->user_id,
            // 'rating_and_comment_id' => $request->rating_and_comment_id,
            // 'body' => $request->body,
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
        RepliedReview::destroy($id);
    }
}
