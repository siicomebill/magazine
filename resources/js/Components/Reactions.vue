<template>
	<div class="flex">
		<button
			v-for="reaction in reactions"
			:key="reaction.id"
			@click="react(reaction.name)"
			type="button"
			class="block"
		>
			<span
				class="block rounded-t-lg appearance-none bg-gradient-to-br from-blue-600 to-blue-700 py-2 px-4 hover:bg-gradient-to-b hover:to-white hover:from-gray-300 hover:text-blue-600 transition-all duration-300"
			>
				{{ reaction.name }}
			</span>

			<span class="block rounded-b-lg appearance-none bg-white text-blue-600">
				{{ reaction.count }}
			</span>
		</button>
	</div>
</template>

<script>
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
			//FIXME Generalize this method and export it to a mixin
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
</script>