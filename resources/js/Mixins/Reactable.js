import axios from "axios";

export default {
	props: {
		givenReactions: {
			type: Array,
			required: true,
		},
		reactTo: {
			type: String,
			required: true,
		},
		itemId: {
			type: [String, Number],
			required: true,
		},
	},
	methods: {
		react(reactionType) {
			axios
				.post(`/react/${this.reactTo}`, {
					item: {
						id: this.itemId,
					},
					reaction: {
						type: reactionType,
					},
				})
				.then((response) => {
					this.reactions = response.data;
				})
				.catch((error) => {
					if (error.response.status == 401)
						this.$redirect(this.$route("login"));
				});
		},
	},
	data() {
		return {
			reactions: this.givenReactions,
		};
	},
	computed: {
		sortedReactions() {
			return this.reactions.sort((a, b) => (a.id > b.id ? 1 : -1));
		},
	},
};