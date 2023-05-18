const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            aspectRatio: {
                '4/3': '4 / 3',
                '9/16': '9 / 16',
                '1/1': '1 / 1',
            },
            width: {
                '144': '36rem',
            },
            fontSize: {
                'xxs': '0.70rem',
            }
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],
};
