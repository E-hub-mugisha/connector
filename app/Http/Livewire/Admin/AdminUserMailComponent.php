<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Mail\UserEmail;
use Livewire\WithPagination;
use Mail;


class AdminUserMailComponent extends Component
{
    use WithPagination;
    
    
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.admin-user-mail-component',['users' => $users])->layout('layouts.app');
    }
}
