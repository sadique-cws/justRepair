// tailwind.config.js

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
        vibrate: {
          '0%, 100%': {
            transform: 'translateX(0) translateY(0) rotate(0)',
          },
          '20%': {
            transform: 'translateX(-2px) translateY(-2px) rotate(-2deg)',
          },
          '40%': {
            transform: 'translateX(2px) translateY(2px) rotate(2deg)',
          },
          '60%': {
            transform: 'translateX(-2px) translateY(-2px) rotate(-2deg)',
          },
          '80%': {
            transform: 'translateX(2px) translateY(2px) rotate(2deg)',
          },
        },
      },
      animation: {
        vibrate: 'vibrate 1s infinite',
      },
    },
  },
  plugins: [],
};
