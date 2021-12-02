<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Class SelectUi
 * A select with a better ui.
 *
 * @package App\View\Components
 */
class Select extends Component
{
    /** @var \Illuminate\Support\HtmlString $slot */
    private HtmlString $slot;

    /**
     * SelectUi constructor.
     *
     * @param string      $name
     * @param string|null $label
     * @param string|null $errorMessage
     */
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $errorMessage = null
    ) {
        $this->formatLabel();
    }

    /**
     * Render blade component
     *
     * @return \Closure
     */
    public function render(): Closure
    {
        return function (array $data) {
            $this->slot = $data['slot'];

            return 'components.select';
        };
    }

    /**
     * Expose the public method jsonOptions to be used on
     * the blade component encoding options to a json format
     *
     * @return string
     */
    public function jsonOptions(): string
    {
        return json_encode($this->options());
    }

    /**
     * Get what was passed inside the slot attribute and cast
     * into id and name to be used inside the component
     * List of options to array of [id,name]
     *
     * @return array<string,string>
     */
    public function options(): array
    {
        $options = collect(explode("\n", (string)$this->slot))->map(function ($o) {
            $o = trim($o);
            $name = $this->getNameFromOptionTag($o);
            $id = $this->getIdFromOptionTag($o);

            return (object)compact('id', 'name');
        });

        if ($options->isEmpty()) {
            return [
                (object)['id' => '0', 'name' => 'Empty select'],
            ];
        }

        return $options->toArray();
    }

    /**
     * Get name from inside an option tag
     * <option value="">$name</option>
     *
     * @param string $option
     *
     * @return string
     */
    private function getNameFromOptionTag(string $option): string
    {
        preg_match("#<option.*?>([^<]+)</option>#", $option, $result);

        if (isset($result[1])) {
            return $result[1];
        }

        return '';
    }

    /**
     * Get id from inside the value attribute of an option html tag
     * <option value="$id"></option>
     *
     * @param string $option
     *
     * @return string
     */
    private function getIdFromOptionTag(string $option): string
    {
        preg_match('/<option\s.*?value="(.+?)"/i', $option, $result);

        if (isset($result[1])) {
            return $result[1];
        }

        return '';
    }

    /**
     * If there are no label declared let's use the name to create
     * an awesome label for the component
     */
    private function formatLabel(): void
    {
        if (!$this->label instanceof HtmlString) {
            $this->label = (string)__($this->label ?? str_replace('_', ' ', Str::title(Str::snake($this->name))));
        }
    }
}
