/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    safelist: [
        "sm:max-w-sm",
        "sm:max-w-md",
        "sm:max-w-md",
        "md:max-w-lg",
        "md:max-w-xl",
        "lg:max-w-2xl",
        "lg:max-w-3xl",
        "lg:max-w-7xl",
        "xl:max-w-4xl",
        "xl:max-w-5xl",
        "2xl:max-w-6xl",
        "2xl:max-w-7xl",
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT: '#056684',
                    50: '#BEEEFD',
                    100: '#ABE9FC',
                    200: '#83DEFA',
                    300: '#5CD4F9',
                    400: '#35C9F7',
                    500: '#0EBFF6',
                    600: '#08A3D3',
                    700: '#0684AB',
                    800: '#056684',
                    900: '#033C4E',
                    950: '#022733'
                }
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                ramilas: ['TT Ramillas Trl', 'sans-serif']
            },
            container: {
                padding: '1.2rem',
                center: true,
                screens: {
                    xl: '1400px'
                }
            },
            animation: {
                marquee: "marquee 20s linear infinite",
                marquee2: "marquee2 20s linear infinite"
            },
            keyframes: {
                marquee: {
                    "0%": {
                        transform: "translateX(0px)"
                    },
                    "100%": {
                        transform: "translateX(var(--marquee-width))"
                    },
                },
                marquee2: {
                    "0%": {
                        transform: "translateX(var(--marquee-width))"
                    },
                    "100%": {
                        transform: "translateX(0px)"
                    },
                },
            }
        }
    }
};
