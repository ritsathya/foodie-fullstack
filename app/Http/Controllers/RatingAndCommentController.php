<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RatingAndComment;
use App\Notifications\RealTimeNotification;

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
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
            'rating_star' => 'required|integer',
        ]);

        $newComment = RatingAndComment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'body' => $request->body,
            'rating_star' => $request->rating_star,
        ]);

        $comments = RatingAndComment::where('post_id', $post->id)->get();
        $stars = 0;

        foreach ($comments as $key => $comment) {
            $stars += $comment->rating_star;
        }

        $over_all_stars = $stars/sizeof($comments);

        $post = Post::find($post->id);
        $post->review = $over_all_stars;
        $post->save();

        // notify post owner about new comment
        $owner = User::find($post->user_id);
        $owner->notify(new RealTimeNotification('You recieved new comment on post: ' . $post->title));

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
    public function update(Request $request, $comment)
    {
        $request->validate([
            'body' => 'required|string',
            'rating_star' => 'required|integer',
        ]);

        $update_comment = RatingAndComment::find($comment);
        $update_comment->update([
            'body' => $request->body,
            'rating_star' => $request->rating_star,
            'status' => 'edited',
        ]);

        $comments = RatingAndComment::where('post_id', $update_comment->post_id)->get();
        $stars = 0;

        foreach ($comments as $key => $comment) {
            $stars += $comment->rating_star;
        }

        $over_all_stars = $stars/sizeof($comments);

        $post = Post::find($comment->post_id);
        $post->review = $over_all_stars;
        $post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_id = RatingAndComment::find($id)->post_id;

        RatingAndComment::destroy($id);

        $comments = RatingAndComment::where('post_id', $post_id)->get();

        if(!empty($comment))
        {
            $stars = 0;

            foreach ($comments as $key => $comment) {
                $stars += $comment->rating_star;
            }

            $over_all_stars = $stars/sizeof($comments);

            $post = Post::find($post_id);
            $post->review = $over_all_stars;
            $post->save();
        }else{
            $post = Post::find($post_id);
            $post->review = 0.0;
            $post->save();
        }

        

        return redirect()->back();
    }
}
