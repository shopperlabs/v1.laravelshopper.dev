const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
    './resources/**/*.antlers.html',
    './resources/**/*.blade.php',
    './content/**/*.md'
  ],
  important: true,
  theme: {
    extend: {
      colors: {
        gray: colors.slate,
        blue: colors.blue,
        sky: colors.sky,
        ninja: {
          blue: '#00b1e1',
          orange: '#f49b0b',
          red: '#e03a10',
          purple: '#925aa1',
          green: '#4c9c23'
        },
        teal: '#01D7B0',
        mint: '#B8FFF3',
      },
      fontFamily: {
        display: ['Inter var', 'sans-serif'],
        sans: ['Euclid Triangle', 'Inter', defaultTheme.fontFamily.sans],
        mono: ['Fira Code', 'monospace', ...defaultTheme.fontFamily.mono],
        system: defaultTheme.fontFamily.sans,
      },
      fontSize: {
        '7xl': ['4.25rem', 1],
        '8xl': ['5rem', 1],
        '9xl': ['6rem', 1],
      },
      height: {
        'screen-sans-nav': 'calc(100vh - 100px)',
      },
      maxHeight: {
        'screen-sans-nav': 'calc(100vh - 100px)',
      },
      boxShadow: {
        'white': "2px 2px 0 theme('colors.white', 'currentColor')",
        'white-lg': "4px 4px 0 theme('colors.white', 'currentColor')",
        'stack-black': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.black'), 4px 4px 4px theme('colors.gray.900')",
        'stack-blue-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.blue.600'), 4px 4px 4px theme('colors.blue.300')",
        'stack-yellow-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.black'), 4px 4px 4px theme('colors.yellow.300')",
        'stack-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.blue.300')",
        'stack': "5px 5px 0 -1px #fff, 5px 5px 0 theme('colors.blue.300')",
        'stack-md': "10px 10px 0 -1px #fff, 10px 10px 0 theme('colors.blue.300')",
        'stack-lg': "20px 20px 0 -1px #fff, 20px 20px 0 theme('colors.blue.300'), 40px 40px 0 -1px #fff, 40px 40px 0 theme('colors.black')",
        'bleed-yellow': "0 3px 1px theme('colors.yellow.300')",
        'outline': '0 0 0 3px rgba(66, 153, 225, 0.5)',
      },
      maxWidth: {
        '4.5xl': '60rem',
        '8xl': '90rem',
      },
      spacing: {
        68: '17rem',
        74: '18.5rem',
        76: '19rem'
      }
    },
  },
  plugins: [
    plugin(function({ addUtilities }) {
      const newUtilities = {
        '.list-col-1': {
          'column-count': '1',
        },
        '.list-col-2': {
          'column-count': '2',
        },
        '.list-col-3': {
          'column-count': '3',
        },
        '.list-col-4': {
          'column-count': '4',
        },
      }
      addUtilities(newUtilities, {
        variants: ['responsive'],
      })
    })
  ],
}
