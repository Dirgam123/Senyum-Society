<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function saveProfile()
    {
        $user = Auth::user();

        // Validate input fields
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',  // Optional password field with confirmation
        ]);

        // Update user profile
        $user->name = $this->name;
        $user->email = $this->email;

        // Update password if provided
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
