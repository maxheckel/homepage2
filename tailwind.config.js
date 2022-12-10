const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Quicksand', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    100: '#DEEDCF',
                    200: '#BFE1B0',
                    300: '#99D492',
                    400: '#74C67A',
                    500: '#56B870',
                    600: '#39A96B',
                    700: '#1D9A6C',
                    800: '#188977',
                    900: '#137177',
                },
                // ...
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
