<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUsersComponent extends Component
{
    use WithPagination;

    public function adminActivate($user_id)
    {
        $user = User::find($user_id);
        $user->utype = "ADM";
        $user->save();
        session()->flash('message','users admin activated');
    }
    public function customerActivate($user_id)
    {
        $user = User::find($user_id);
        $user->utype = "CST";
        $user->save();
        session()->flash('message','users customer activated');
    }
    public function render()
    {
        $users = User::paginate(9);
        return view('livewire.admin.admin-users-component',['users' => $users])->layout('layouts.app');
    }
}
