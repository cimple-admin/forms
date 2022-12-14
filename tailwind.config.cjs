/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php"],
  safelist: [
      {
        pattern: /.*xs/,
      },
      {
          pattern: /btn.*/,
      },
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}
