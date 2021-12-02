<x-input.text
    {{ $attributes }}
    x-data="{}"
    x-init="
        new Cleave($el, {
            numericOnly: true,
            blocks: [2, 3, 3, 4, 2],
            delimiters: ['.', '.', '/', '-']
        });
    "/>
