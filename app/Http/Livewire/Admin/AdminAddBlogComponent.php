<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blogs;
use Livewire\Component;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminAddBlogComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $content;
    public $blog_category;
    public $image;
    public $thumbnail;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required',
            'blog_category' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
            'content' => 'required',
        ]);
    }

    public function createBlog()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'blog_category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|mimes:jpeg,png,jpg',
            'content' => 'required',
        ]);

        $blog = new Blogs();
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $blog->blog_category = $this->blog_category;
        $blog->content = $this->content;

        $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('blogs/thumbnails',$imageName);
        $blog->thumbnail = $imageName;

        $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('blogs',$imageName2);
        $blog->image = $imageName2;

        $blog->save();
        session()->flash('message','blog created successfully!');

    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-blog-component',['categories'=>$categories])->layout('layouts.app');
    }
}
