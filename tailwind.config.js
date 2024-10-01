/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.{html,php,js}"],
  theme: {
    extend: {
      colors: {
        primary: '#0C32F0',
        primary_lighter: ' rgb(241, 245, 254)',
        gray_base: '#5E636E',
        gray_darker: '#17191C;',
        iconColor: '#6b6d71',
        danger:'#d92632',
      },
    },
  },
  plugins: [],
}
