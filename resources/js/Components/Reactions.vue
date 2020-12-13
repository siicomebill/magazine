<template>
	<div class="grid grid-cols-2 gap-4">
		<button
			v-for="reaction in sortedReactions"
			:key="reaction.id"
			@click="react(reaction.name)"
			type="button"
			class="block"
		>
			<div :class="{'grid': reaction.count > 0}" class="shadow-lg rounded-lg grid-cols-4 bg-white">
				<span
					class="col-span-3 text-white flex items-center justify-items-center rounded-lg appearance-none bg-gradient-to-br from-blue-600 to-blue-700 py-2 px-4 hover:bg-gradient-to-l hover:from-white hover:to-blue-300 hover:text-blue-600 transition-all duration-300"
				>
					<span class="m-auto">{{ reaction.name }}</span>
				</span>

				<span v-if="reaction.count > 0" class="flex items-center justify-items-center rounded-r-lg appearance-none text-blue-600">
					<span class="m-auto">{{ reaction.count }}</span>
				</span>
			</div>
		</button>
	</div>
</template>

<script>
import Reactable from "@/Mixins/Reactable";

export default {
	mixins: [
		Reactable,
	],
};
</script>