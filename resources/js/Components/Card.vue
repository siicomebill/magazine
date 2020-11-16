<template>
	<div class="my-4">
		<a class="block rounded-lg shadow-xl" :href="href" :target="target" :rel="rel">
			<Thumbnail
				:src="image"
				:alt="title"
				square
				class="w-auto rounded-t-lg text-center overflow-hidden"
			/>
			<div
				class="flex flex-col p-4 w-50 justify-between leading-normal break-normal"
			>
				<div class="mb-8">
					<p class="font-bold text-2xl mb-2 break-words">
						{{ title }}
					</p>
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
		</a>
	</div>
</template>

<script>
import Thumbnail from "~/Thumbnail";

export default {
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
};
</script>