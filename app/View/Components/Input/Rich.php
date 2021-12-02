<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Rich extends Component
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('components.input.rich');
    }
}
