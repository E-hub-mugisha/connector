<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::where('author_id', Auth::user()->id)->get();
        return view('stadmin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ServiceCategory::all();
        $subcategory = ServiceSubCategory::all();
        return view('stadmin.blog.create', compact('categories','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'blog_category' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blogs();
        $slugTitle = Str::slug($request->input("title"));
        $blog->slug = $slugTitle;
        $blog->title = $request->input('title');
        $blog->author_id = Auth::user()->id;
        $blog->blog_category = $request->input('blog_category');
        $blog->sub_category = $request->input('sub_category');
        $blog->content = $request->input('content');
        $blog->featured = '0';

        if ($image = $request->file('image')) {
            $destinationPath = 'image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $blog['image'] = "$profileImage";
        }
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'thumbnail/blog/';
            $profileThumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileThumbnail);
            $blog['thumbnail'] = "$profileThumbnail";
        }

        $blog->save();
        session()->flash('message', 'blog saved');
        return redirect()->route('serviceProviderBlog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $blog = Blogs::where('slug', $slug)->first();
        return view('stadmin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = ServiceCategory::all();
        $subcategory = ServiceSubCategory::all();
        $blog = Blogs::findOrFail($id);
        return view('stadmin.blog.edit', compact('categories', 'blog','subcategory'));
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
        $blog = Blogs::find($id);

        $request->validate([
            'title' => 'required',
            'blog_category' => 'required',
            'content' => 'required',
            'status' => 'required|in:pending,approved,declined',
            'featured' => 'required',
        ]);

        $slugTitle = Str::slug($request->input("title"));
        $blog->slug = $slugTitle;
        $blog->author_id = Auth::user()->id;
        $blog->title = $request->input('title');
        $blog->blog_category = $request->input('blog_category');
        $blog->sub_category = $request->input('sub_category');
        $blog->content = $request->input('content');
        $blog->featured = $request->input('featured');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $blog['image'] = "$profileImage";
        }
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'thumbnail/blog/';
            $profileThumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileThumbnail);
            $blog['thumbnail'] = "$profileThumbnail";
        }

        $blog->update();
        session()->flash('message', 'blog updated');
        return redirect()->route('serviceProviderBlog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Blogs::findOrFail($id);
        $data->delete();
        Session()->flash('message', 'blogs has been deleted Successfully!');
        return redirect()->route('serviceProviderBlog.index');
    }
}
