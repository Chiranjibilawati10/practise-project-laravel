<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use App\User;
use Auth;
use Redirect;


class CommentController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->post_id);
        $post->comments()->save($reply);

        return back();

    }
    public function edit($id)
    {
        
        $updateComment = Comment::where('id',$id)->get();

        return view('posts.edit-comment')->withupdateComment($updateComment);
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
    public function update(Request $request, Comment $comment)
    {

        $comment->comment = $request->comment;
      
        $comment->save();
    return redirect()->route('posts.show',$comment->commentable_id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
        
        Session::flash('success', 'This comment deleted successfully.');

        return Redirect::back();
    }
}
