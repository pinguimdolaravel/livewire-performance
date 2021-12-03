<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Audits extends Component
{
    public User $user;

    public bool $modal = false;

    public function render()
    {
        return view('livewire.user.audits', [
            'audits' => $this->modal ? $this->user->audits : [],
        ]);
    }
}
