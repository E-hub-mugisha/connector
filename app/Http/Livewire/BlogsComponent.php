<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blogs;
use Illuminate\Support\Str;

class BlogsComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = Blogs::latest()->paginate(9);
        return view('livewire.blogs-component',['blogs'=>$blogs])->layout('layouts.base');
    }
}
