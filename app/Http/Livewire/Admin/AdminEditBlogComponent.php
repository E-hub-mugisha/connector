<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminEditBlogComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-edit-blog-component')->layout('layouts.app');
    }
}
