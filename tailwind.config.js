/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
       "./resources/**/*.js",
  ],
  theme: {
    extend: {
         backgroundImage: {
        'radial-gradient-black': 'radial-gradient(50% 50% at 50% 50%, #4E4E4E 0%, #3D3B3B 99.99%, #3D3B3B 100%)',
      },
        fontFamily: {
            'sansation': ['Sansation'],
      },
    },
  },
  plugins: [
       require('@tailwindcss/forms'),
  ],
}
