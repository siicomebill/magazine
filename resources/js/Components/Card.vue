<template>
	<div class="my-4">
		<span class="block rounded-lg shadow-xl">
			<a :href="href" :target="target" :rel="rel">
				<Thumbnail
					:src="image"
					:alt="title"
					square
					class="w-auto rounded-t-lg text-center overflow-hidden"
				/>
			</a>
			<div
				class="flex flex-col p-4 w-50 justify-between leading-normal break-normal"
			>
				<div class="mb-8">
					<a class="block font-bold text-2xl mb-2 break-words" :href="href" :target="target" :rel="rel">
						{{ title }}
					</a>
					<p class="text-gray-700 text-base">{{ snippet }}</p>
					<div class="my-3">
						<div class="text-sm" v-if="author">
							<p class="text-gray-500 leading-none">{{ author.name }}</p>
						</div>
					</div>

					<div>
						<slot></slot>
					</div>
				</div>

				<div>
					<slot name="footer"></slot>
				</div>
			</div>
		</span>
	</div>
</template>

<script>
import Thumbnail from "~/Thumbnail";
import ContentResource from "@/Mixins/ContentResource";

export default {
	mixins: [
		ContentResource,
	],
	components: {
		Thumbnail,
	},
	props: {
		title: {
			type: String,
			required: true,
		},
		snippet: {
			type: String,
			required: false,
		},
		image: String,
		author: {
			type: Object,
			required: false,
		},
	},
};
</script>