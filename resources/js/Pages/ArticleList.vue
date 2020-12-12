<template>
	<div class="text-white">
		<div class="bg-primary banner mb-3">
			<div
				:class="{ 'xl:grid': category.image }"
				class="grid-cols-4 gap-4 items-center container mx-auto p-4"
			>
				<div class="col-span-3 mx-auto py-20 px-10 text-center" v-if="category">
					<p class="text-4xl font-banner capitalize">{{ category.name }}</p>

					<p class="text-xl" v-if="category.snippet">{{ category.snippet }}</p>
				</div>

				<div v-if="category.image">
					<Thumbnail
						square
						:src="category.image"
						class="w-auto rounded-lg text-center overflow-hidden border-4 border-white shadow-lg"
					/>
				</div>
			</div>
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

		<div v-if="children.length">
			<CategoryCard
				v-for="child in children"
				:key="child.id"
				:content="child"
			/>
		</div>
	</div>
</template>

<script>
import Card from "~/ArticleImageCard";
import Thumbnail from "~/Thumbnail";

export default {
	components: {
		Card,
		Thumbnail,
		CategoryCard: () => import("~/CategoryCard"),
	},
	props: {
		category: Object,
		articles: Array,
		children: Array,
	},
};
</script>