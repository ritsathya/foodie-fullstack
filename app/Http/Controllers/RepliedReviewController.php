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
    public function store(Request $request)
    {
        $request->validate([
            'rating_and_comment_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        RepliedReview::create([
            // 'user_id' => auth()->user()->id,
            // 'rating_and_comment_id' => $request->rating_and_comment->id,
            // 'body' => $request->body,

            'user_id' => $request->user_id,
            'rating_and_comment_id' => $request->rating_and_comment_id,
            'body' => $request->body,
        ]);
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
