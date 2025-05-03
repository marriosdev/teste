/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.vue",
    "./resources/**/*.js",
  ],
  corePlugins: {
    preflight: false, // DESATIVE temporariamente
  },
  theme: {
    extend: {},
  },
  plugins: [],
}