<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blogs;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminEditBlogComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $content;
    public $blog_category;
    public $image;
    public $thumbnail;

    public $newimage;
    public $newthumbnail;


    public function mount($slug)
    {
        $blog = Blogs::find($slug);
        $this->id = $blog->id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->blog_category = $blog->blog_category;
        $this->content = $blog->content;
        $this->image = $blog->image;
        $this->thumbnail = $blog->thumbnail;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
            'blog_category' => 'required',
            'content' => 'required',
        ]);

        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        } elseif ($this->newthumbnail) {
            $this->validateOnly($fields, [
                'newthumbnail' => 'required|mimes: jpeg,png,jpg'
            ]);
        }
    }

    public function updateProductCategory()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'blog_category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|mimes:jpeg,png,jpg',
            'content' => 'required',
        ]);

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        } elseif ($this->newthumbnail) {
            $this->validate([
                'newthumbnail' => 'required|mimes: jpeg,png,jpg'
            ]);
        }

        $blog = Blogs::find($this->slug);
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $blog->blog_category = $this->blog_category;
        $blog->content = $this->content;

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
            $this->thumbnail->storeAs('blogs/thumbnails', $imageName);
            $blog->thumbnail = $imageName;
        }

        if ($this->newimage) {
            $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('blogs', $imageName2);
            $blog->image = $imageName2;
        }
        $blog->save();
        session()->flash('message', 'blog updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-blog-component')->layout('layouts.app');
    }
}
