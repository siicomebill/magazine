export default {
    props: {
        id: {
            type: [Number, String],
            required: false,
        },
        href: {
            type: String,
            required: false,
        },
        outsider: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
		rel(){
			return this.outsider ? 'noopener noreferrer nofollow' : ''
		},
		target(){
			return this.outsider ? '_blank' : ''
		}
	}
}