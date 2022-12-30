<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use League\CommonMark\Normalizer\SlugNormalizer;
use League\CommonMark\Normalizer\UniqueSlugNormalizer;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('published_at')->where('published_at', '!=', null)->paginate(20);
        return Inertia::render('Blog', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Dashboard/Blog/CreateEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $this->storeOrUpdatePost($request, $post);

        session()->flash('flash.banner', 'Post created!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('id', explode('-', $slug)[0])->where('published_at', '!=', null)->first();
        if ($post == null){
            abort(404);
        }
        return Inertia::render('Post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Dashboard/Blog/CreateEdit', compact('post'));
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
        $this->storeOrUpdatePost($request, $post);
        session()->flash('flash.banner', 'Post updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.blog.edit', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('flash.banner', 'Post deleted!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.blog');
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return void
     */
    protected function storeOrUpdatePost(Request $request, Post $post): void
    {
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->short_content = $request->get('shortContent');
        if (!$request->get('saveOnly')){
            $post->published_at = Carbon::now();
        }
        if ($request->get('unpublish')){
            $post->published_at = null;
        }
        $slug = new SlugNormalizer();
        $post->slug = $slug->normalize($request->get('title'));
        /** @var UploadedFile $thumbnail */
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail != null) {
            $thumbnail->storePublicly('', 'public_uploads');
            // Delete the old file
            if ($post->thumb_image_url != null){
                unlink(public_path() . '/uploads/'.$post->thumb_image_url);
            }
            $post->thumb_image_url = $thumbnail->hashName();
        }
        $post->save();
    }
}
