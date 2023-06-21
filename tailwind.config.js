const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    DEFAULT: "#0D0D2B",
                    icon: "#3671E9",
                    button: "#3671E9",
                    white10: "#FFFFFF1A",
                },
                purple: {
                    "50": "#F6F5FF",
                    "100": "#EDEBFE",
                    "200": "#DCD7FE",
                    "300": "#CABFFD",
                    "400": "#AC94FA",
                    "500": "#9061F9",
                    "600": "#7E3AF2",
                    "700": "#6C2BD9",
                    "800": "#5521B5",
                    "900": "#4A1D96",
                },
                blue: {
                    "50": "#EBF5FF",
                    "100": "#E1EFFE",
                    "200": "#C3DDFD",
                    "300": "#A4CAFE",
                    "400": "#76A9FA",
                    "500": "#3F83F8",
                    "600": "#1C64F2",
                    "700": "#1A56DB",
                    "800": "#1E429F",
                    "900": "#233876",
                },
                lightBlue: {
                    50: '#e1f5fe',
                    100: '#b3e5fc',
                    200: '#81d4fa',
                    300: '#4fc3f7',
                    400: '#29b6f6',
                    500: '#03a9f4',
                    600: '#039be5',
                    700: '#0288d1',
                    800: '#0277bd',
                    900: '#01579b',
                },
                red: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                    800: '#991b1b',
                    900: '#7f1d1d',
                    950: '#450a0a',
                }

            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
