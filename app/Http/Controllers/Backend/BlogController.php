<?php

namespace amity\Http\Controllers\Backend;

use Illuminate\Http\Request;
use amity\Post;
use amity\Http\Requests\storePostRequest;
use amity\Http\Requests\updatePostRequest;

class BlogController extends Controller
{

    protected $posts;

    public function __construct(Post $posts) {
        $this->posts = $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
       $posts = $this->posts->with('author')->orderby('published_at', 'desc')->paginate(10);

    return   view('backend.blog.index', compact('posts'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.blog.form', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request)
    {
        $this->posts->create(['author_id' => auth()->user()->id] + $request->only('title', 'slug', 'published_at', 'body', 'excerpt' ));

        return redirect(route('blog.index'))->with(['status' => 'Post has been Created']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->posts->findOrFail($id);

        return view('backend.blog.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, $id)
    {
        $post = $this->posts->findOrFail($id);

        $post->fill($request->only('title', 'slug', 'published_at', 'body', 'excerpt'))->save();

        return redirect(route('blog.edit', $post->id))->with(['status' => 'Post have been updated']);
    }


    public function confirm ($id) {
        $post = $this->posts->findOrFail($id);

        return view('backend.blog.confirm', compact('post'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->posts->findOrFail($id);

        $post->delete();

         return redirect(route('blog.index'))->with(['status' => 'Blog post have been deleted']); 
    }
}
