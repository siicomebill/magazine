<template>
	<a class="py-4 rounded-lg flex flex-col md:flex-row items-center gap-4" :href="userURL">
		<div
			v-if="profile_photo_url"
			class="inline-block border-4 border-white p-0 rounded-full"
		>
			<Thumbnail
				square
				:src="profile_photo_url"
				class="w-16"
				imageClass="w-16 h-full rounded-full"
			/>
		</div>

		<div class="text-4xl text-center">
			<p class="leading-none font-handwritten">{{ name }}</p>
		</div>
	</a>
</template>

<script>
import Thumbnail from "~/Thumbnail";

export default {
	components: {
		Thumbnail,
	},
	props: {
		profile_photo_url: String,
		name: String,
		id: [Number, String]
	},
	computed: {
		userURL(){
			return this.$route("user.page", {
				id: this.id
			})
		},
	},
};
</script>