<template>
	<div class="container mx-auto rounded-lg text-white p-6">
		<div class="items-center text-center lg:text-left">
			<div v-if="content.parent" class="mb-0">
				<a
					:href="$route('categories.articles', content.parent.id)"
					class="bg-primary py-1 px-4 text-black rounded-full font-banner uppercase text-xl"
				>
					{{ content.parent.name }}
				</a>
			</div>
			<a
				:href="$route('categories.articles', content.id)"
				class="block text-3xl font-banner lg:text-6xl capitalize"
			>
				<span class="text-primary">#</span>
				<span>{{ content.name }}</span>
			</a>
		</div>

		<p v-if="content.snippet" class="text-gray-500 my-3">
			{{ content.snippet }}
		</p>
		<div>
			<div class="block grid-flow-cols gap-4">
				<div
					class="sm:grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 grid-flow-rows gap-4"
				>
					<Card
						v-bind="article"
						v-for="article in content.articles"
						:key="article.id"
						:href="$route('articles.read', article.id)"
						class="h-auto bg-transparent"
					/>
				</div>
			</div>
		</div>

		<a
			class="block w-full border border-1 border-black rounded-full p-3 text-center bg-primary text-black font-banner uppercase"
			:href="$route('categories.articles', content.id)"
		>
			Vedi tutti
		</a>
	</div>
</template>

<script>
import Card from "~/ImageCard";

export default {
	components: {
		Card,
	},
	props: {
		content: Object,
	},
};
</script>