<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blogs;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminBlogsComponent extends Component
{
    public function render()
    {
        $blogs = Blogs::paginate(9);
        return view('livewire.admin.admin-blogs-component',['blogs'=>$blogs])->layout('layouts.app');
    }
}
