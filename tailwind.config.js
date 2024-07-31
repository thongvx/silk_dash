/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            keyframes: {
                colorChange: {
                    '0%, 100%': { color: '#ff2c2c' },
                    '50%': { color: '#20fac3' },
                    '75%': { color: '#fff439' },
                },
            },
            animation: {
                colorChange: 'colorChange 2s ease-in-out infinite',
            },
        },
    },
    plugins: [],
}

