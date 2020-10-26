<template>
	<button
		@click="react()"
		type="button"
		class="bg-gradient-to-br from-blue-600 to-blue-700 py-2 px-4 rounded-lg hover:bg-gradient-to-r hover:from-white hover:to-gray-300 hover:text-blue-600 appearance-none transition-all duration-300"
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