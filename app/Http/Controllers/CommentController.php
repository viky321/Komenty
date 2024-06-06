<?php

namespace App\Http\Controllers;

use id;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * ci je user prihlaseny construct, ak nie zatavi ta to
     */
    public function __construct()
    {
        $this->middleware('auth');
    }/**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return redirect()->back();
        $request->validate([
            'text' => 'required',
            'post_id' => 'required|integer|exists:posts,id',

        ]);

        $comment = auth()->user()->comments()->create( $request->all());
        $post = $comment->post;


        if (!$post) {
            return redirect()->back()->with('error', 'Associated post not found.');
        }



        return redirect("/posts/" . $comment->post->slug . "#comments")->with('flash', 'Congratulations, your comment has been added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->text = $request->input('text');
        $comment->save();

        return response()->json(['success' => 'Comment updated successfully.']);


    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {

        $comment = Comment::findOrFail($id);
        $comment->delete();

        $commentCount = Comment::count();
        return response()->json(['message' => 'Comment deleted successfully', 'commentCount' => $commentCount]);



    }

}

