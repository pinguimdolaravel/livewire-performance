<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public ?string $search = null;

    protected $queryString = ['search'];

    protected $listeners = [
        'user::updated' => '$refresh',
        'user::deleted' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.users', [
            'users' => User::query()
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%'))
                ->paginate(5)
        ]);
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }
}
