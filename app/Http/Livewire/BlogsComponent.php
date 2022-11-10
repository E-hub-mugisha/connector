<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blogs;

class BlogsComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = Blogs::paginate(9);
        return view('livewire.blogs-component',['blogs'=>$blogs])->layout('layouts.base');
    }
}
