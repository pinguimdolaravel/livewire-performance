<x-input.text
    {{ $attributes }}
    x-data="{}"
    x-init="
        new Cleave($el, {
            numericOnly: true,
            blocks: [3, 3, 3, 2],
            delimiters: ['.', '.', '-']
        });
    "/>
