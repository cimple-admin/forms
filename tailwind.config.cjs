/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: [
    "./resources/**/*.blade.php",
  ],
  darkMode: false, // or 'media' or 'class'
  content: [
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}
