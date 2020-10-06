<template>
	<div class="py-4">
		<a class="block bg-white text-black rounded-lg lg:flex" :href="href">
			<Thumbnail
				v-if="image"
				:src="image"
				square
				class="lg:w-1/2 rounded-lg text-center overflow-hidden"
			/>
			<div
				class="flex flex-col p-4 justify-between leading-normal w-full break-normal"
				:class="{ 'lg:w-1/2': image }"
			>
				<div class="mb-8">
					<p class="font-bold text-2xl text-primary mb-2 break-words">
						{{ title }}
					</p>
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
import Card from "~/Card";

export default {
	extends: Card,
};
</script>