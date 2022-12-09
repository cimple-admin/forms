/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php"],
  safelist: [
      {
        pattern: /.*xs/,
      },
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}
