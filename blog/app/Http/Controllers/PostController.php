<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use App\User;
use Purifier;
use Image;
use Storage;
use Comment;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category_id' =>'required|integer',
            'body'=> 'required',
            'featured_image'=> 'sometimes|image',
        ]);
        //storing into the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        //image upload

        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$fileName);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $fileName;
        }

        $post->save();
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::pluck('name','id')->toArray();
        $cats = [];

        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags);
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
        $post = Post::find($id);
        // if ($request->input('slug') == $post->slug)
        // {
        //     $this->validate($request, [
        //         'title' => 'required|max:255',
        //         'category_id' =>'required|integer',
        //         'body'=> 'required'
        //     ]);
        // } else {
            //validate the data
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' =>'required|integer',
                'body'=> 'required',
                'featured_image'=>'image'
            ]);
        //   }

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')){
            //add new photo
            $image = $request->file('featured_image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$fileName);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFileName = $post->image;
            //update the datbase
            $post->image = $fileName;
            //delete the old photo
            Storage::delete(($oldFileName));
        }

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'This post was successfully saved.');

        return redirect()->route('posts.show', $post->id);
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
        $post->tags()->detach();

        Storage::delete($post->image);
        $post->delete();
        
        Session::flash('success', 'This post deleted successfully.');

        return redirect()->route('posts.index');
    }
}
