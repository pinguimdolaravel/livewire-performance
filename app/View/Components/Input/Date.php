<?php

namespace App\View\Components\Input;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Class Date
 * @package App\View\Components\Input
 * @suppressWarnings(PHPMD)
 */
class Date extends Component
{
    public function __construct(
        public string $name = '',
        public mixed $label = null,
        public ?bool $labeless = false,
        public ?string $value = null,
        public ?string $icon = null,
        public string $format = 'MM/DD/YYYY',
        public array $options = []
    ) {
        if (!$label instanceof HtmlString) {
            $this->label = __($label ?? str_replace('_', ' ', Str::title(Str::snake($name))));
        }
    }

    public function options(): array
    {
        return array_merge([
            'format'      => $this->format,
            'defaultDate' => null,
        ], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '';
        }

        return ', ...' . json_encode((object)$this->options());
    }

    public function render()
    {
        return view('components.input.date');
    }
}
