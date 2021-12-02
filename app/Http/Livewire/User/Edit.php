<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public bool $modal = false;

    public User $user;

    protected $rules = [
        'user.name'  => 'required|string|max:255',
        'user.email' => 'required|string|email|max:255',
    ];

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        $this->modal = false;
        $this->emit('user::updated');
    }
}
