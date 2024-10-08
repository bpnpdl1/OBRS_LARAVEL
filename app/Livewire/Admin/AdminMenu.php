<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMenu extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-menu');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
