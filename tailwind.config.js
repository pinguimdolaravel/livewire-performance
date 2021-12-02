const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    // purge: [
    //     './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    //     './storage/framework/views/*.php',
    //     './resources/views/**/*.blade.php',
    // ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
			colors: {
                'blue-gray': colors.blueGray,
                rose       : colors.rose,
                'sky'      : colors.sky,
                teal       : colors.teal,
                cyan       : colors.cyan,
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography')
	],
};
