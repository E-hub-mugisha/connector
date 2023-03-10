<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blogs;
use Livewire\Component;

class AdminBlogDetailComponent extends Component
{
    public $blog_slug;

    public function mount($blog_slug)
    {
        $this->blog_slug = $blog_slug;
    }
    public function render()
    {
        $blog = Blogs::where('slug', $this->blog_slug)->first();
        return view('livewire.admin.admin-blog-detail-component',['blog'=>$blog])->layout('layouts.app');
    }
}
