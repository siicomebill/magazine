<template>
	<button
		@click="react()"
		type="button"
		class="bg-blue-600 py-2 px-4 rounded-lg hover:bg-white hover:text-blue-600 transition-all duration-300"
	>
		{{ name }}
	</button>
</template>

<script>
export default {
	props: {
		name: {
			type: String,
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
		type: {
			type: String,
			default: "Like",
		},
	},
	methods: {
		react() {
			this.$inertia.post(`/react/${this.reactTo}`, {
				item: {
					id: this.itemId,
				},
				reaction: {
					type: this.type,
				},
			});
		},
	},
};
</script>