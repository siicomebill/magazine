<template>
	<span
		class="block my-4 rounded-lg"
		:class="{ flex: fixed, 'block lg:flex': !fixed }"
	>
		<a
			v-if="image"
			:href="href"
			:target="target"
			:rel="rel"

			class="rounded-lg text-center overflow-hidden"
			:class="{ 'lg:w-1/2': !fixed, 'w-1/2': fixed }"
		>
			<Thumbnail
				:src="image"
				square
				class="rounded-lg text-center overflow-hidden"
			/>
		</a>

		<div
			class="flex flex-col p-4 justify-between leading-normal w-full break-normal"
			:class="{ 'lg:w-1/2': image }"
		>
			<div class="mb-8">
				<a class="font-bold text-2xl mb-2 break-words" :href="href" :target="target" :rel="rel">
					{{ title }}
				</a>
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
</template>

<script>
import Card from "~/Card";

export default {
	extends: Card,
	props: {
		fixed: {
			type: Boolean,
			default: false,
		},
	},
};
</script>