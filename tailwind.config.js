import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#C9972B',
          dark: '#A67C1F',
          light: '#E8B84B',
        },
        dark: {
          DEFAULT: '#3A3A3A',
          deeper: '#1A1A1A',
        },
        light: '#F5F5F5',
      },
      fontFamily: {
        display: ['Poppins', 'sans-serif'],
        body: ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [forms, typography],
}
