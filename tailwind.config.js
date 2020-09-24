const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        aspectRatio: {
            'none': 0,
            'square': [1, 1],
            '16:9': [16, 9],
            '4:3': [4, 3],
            '21:9': [21, 9],
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        aspectRatio: ['responsive'],
    },

    plugins: [require('@tailwindcss/ui'), require('tailwindcss-aspect-ratio')],
};
