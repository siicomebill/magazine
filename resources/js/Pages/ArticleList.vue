<template>
	<div class="text-white">
		<div class="bg-primary banner mb-3">
			<div
				:class="{ 'lg:grid': category.image }"
				class="grid-cols-4 gap-4 items-center container mx-auto p-4"
			>
				<div v-if="category.image">
					<Thumbnail
						square
						:src="category.image"
						class="lg:w-auto w-1/3 mx-auto rounded-lg text-center overflow-hidden border-4 border-white shadow-lg"
					/>
				</div>

				<div class="order-first col-span-3 mx-auto py-20 px-10 text-center" v-if="category">
					<p class="text-lg sm:text-2xl lg:text-4xl font-banner capitalize">{{ category.name }}</p>

					<p v-if="category.snippet">{{ category.snippet }}</p>
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
export default {
	components: {
		Card: () => import("~/ArticleImageCard"),
		Thumbnail: () => import("~/Thumbnail"),
		CategoryCard: () => import("~/CategoryCard"),
	},
	props: {
		category: Object,
		articles: Array,
		children: Array,
	},
};
</script>