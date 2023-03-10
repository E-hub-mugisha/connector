<?php

namespace App\Http\Livewire;

use App\Models\Blogs;
use Livewire\Component;

class BlogDetailComponent extends Component
{
    public $blog_slug;

    public function mount($blog_slug)
    {
        $this->blog_slug = $blog_slug;
        
    }
    
    public function render()
    {
        $blog = Blogs::where('slug',$this->blog_slug)->first();
        $blog->increment('views');
        $r_blog = Blogs::where('blog_category',$blog->blog_category)->where('slug','!=',$this->blog_slug)->inRandomOrder()->first();
        return view('livewire.blog-detail-component',['blog'=>$blog,'r_blog'=>$r_blog])->layout('layouts.base');
    }
}
