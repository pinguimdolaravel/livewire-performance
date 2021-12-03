<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
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
            'users' => $this->query()
                ->paginate()
        ]);
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function query()
    {
        return User::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%'));
    }

    public function getTotalProperty()
    {
        return Cache::rememberForever('users.count', fn () => User::count());
    }

    public function getTotalFilteredProperty()
    {
        return $this->query()->count();
    }
}
