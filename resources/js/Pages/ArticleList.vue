<template>
	<div class="text-white">
		<div class="xl:grid grid-cols-4 gap-4 items-center container mx-auto py-10">
			<div class="col-span-3 mx-auto py-20 px-10" v-if="category">
				<span class="text-6xl align-middle font-banner capitalize">{{
					category.name
				}}</span>
				<hr class="lg:w-1/2" v-if="category.snippet" />
				<span class="text-xl align-middle" v-if="category.snippet">{{
					category.snippet
				}}</span>
			</div>

			<div v-if="category.image">
				<Thumbnail
					square
					:src="category.image"
					class="w-auto xl:rounded-full rounded-lg text-center overflow-hidden border-4 border-white"
				/>
			</div>
		</div>

		<div class="px-5 lg:px-0">
			<fieldset
				class="container mx-auto border-2 border-gray-700 rounded-full py-4 px-6"
				v-if="category.children.length"
			>
				<legend
					class="lg:text-center px-3 py-1 bg-white text-black rounded-full"
				>
					Sottocategorie
				</legend>
				<a
					class="border-2 border-white rounded-full px-4 py-1 flex-shrink text-center align-middle inline-block"
					v-for="child in category.children"
					:key="child.id"
					:href="$route('categories.articles', child.id)"
					>{{ child.name }}</a
				>
			</fieldset>
		</div>

		<div
			class="container mx-auto py-5 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 grid-flow-rows gap-4"
		>
			<Card
				v-bind="article"
				v-for="article in articles"
				:key="article.id"
				:href="$route('articles.read', article.id)"
			/>
		</div>
	</div>
</template>

<script>
import Card from "~/ImageCard";
import Thumbnail from "~/Thumbnail";

export default {
	components: {
		Card,
		Thumbnail,
	},
	props: {
		category: Object,
		articles: Array,
	},
};
</script>