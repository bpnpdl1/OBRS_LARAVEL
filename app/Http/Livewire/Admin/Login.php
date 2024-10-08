<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;

#
class Login extends Component
{

    public $email, $password;
    public function render()
    {
        return view('livewire.admin.login');
        
    }

    public function login()
    {
      
        try {
            // Validate the email and password inputs
            $this->validate([
                'email' => 'required|email|exists:admins,email',
                'password' => 'required'
            ],[
                'email.exists' => 'This email does not exist in admin records'
            ]);

    
            // Attempt to authenticate the admin user
            if (auth()->guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
              
                // Successfully authenticated, redirect to the admin dashboard
                return redirect()->route('dashboard');

         
            } else {
                // Authentication failed, add an error to display on the form
                $this->addError('password', 'The password is incorrect.');
            }
    
        } catch (\Exception $e) {
            // Handle any unexpected errors
            $this->addError('login', 'There was an error during login: ' . $e->getMessage());
        }
    }
    
}

