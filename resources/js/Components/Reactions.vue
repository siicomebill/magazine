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

			<span
				class="block rounded-b-lg appearance-none bg-white text-blue-600"
			>
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
		async react(reactionType) {
			let response = await axios.post(`/react/${this.reactTo}`, {
				item: {
					id: this.itemId,
				},
				reaction: {
					type: reactionType,
				},
			});

			this.reactions = response.data;
		},
	},
	data() {
		return {
			reactions: this.givenReactions,
		};
	},
};
</script>