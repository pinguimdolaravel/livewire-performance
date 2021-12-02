<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public User $user;

    public bool $modal = false;

    public function render()
    {
        return view('livewire.user.delete');
    }

    public function destroy()
    {
        $this->user->audits->each->delete();
        $this->user->delete();
        $this->emit('user::deleted');
        $this->modal = false;
    }
}
