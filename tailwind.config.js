const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
	purge: {
		layers: ["base", "components", "utilities"],
		content: [
			"./storage/framework/views/*.php",
			"./resources/views/**/*.blade.php",
			"./resources/js/**/*.vue"
        ],
        options: {
            whitelist: [/aspect-ratio-$/]
        }
	},

	future: {
		removeDeprecatedGapUtilities: true,
		purgeLayersByDefault: true
	},

	theme: {
		extend: {
			fontFamily: {
				sans: ["Nunito", ...defaultTheme.fontFamily.sans],
				banner: ["Archivo Black",  "Nunito", ...defaultTheme.fontFamily.sans]
			},
			transitionProperty: {
				default: defaultTheme.transitionProperty.default + ', background'
			},
		},
		aspectRatio: {
			none: 0,
			square: [1, 1],
			"16:9": [16, 9],
			"4:3": [4, 3],
			"21:9": [21, 9]
		},
	},

	variants: {
		opacity: ["responsive", "hover", "focus", "disabled"],
		aspectRatio: ["responsive"],
		backgroundImage: ['responsive', 'hover', 'focus'],
	},

	plugins: [require("@tailwindcss/ui"), require("tailwindcss-aspect-ratio")]
};
