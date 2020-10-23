<template>
	<div class="container mx-auto bg-white rounded-lg shadow-lg p-6 mb-5">
		<a
			:href="$route('categories.articles', content.id)"
			class="block text-3xl font-banner text-center lg:text-left lg:text-6xl capitalize"
		>
			{{ content.name }}
		</a>
		<p v-if="content.snippet" class="text-gray-500 my-3">
			{{ content.snippet }}
		</p>
		<div>
			<div class="block grid-flow-cols gap-4">
				<div class="xl:grid grid-cols-3 gap-2">
					<MiniCard
						class="col-span-2"
						v-bind="content.articles[0]"
						:href="$route('articles.read', content.articles[0].id)"
					/>

					<div>
						<MiniCard
							v-bind="article"
							v-for="article in content.articles.slice(1, 3)"
							:key="article.id"
							:href="$route('articles.read', article.id)"
							class="h-auto bg-transparent"
						/>
					</div>
				</div>

				<div class="md:grid md:grid-cols-3 lg:grid-cols-5 gap-2">
					<Card
						v-bind="article"
						v-for="article in content.articles.slice(3)"
						:key="article.id"
						:href="$route('articles.read', article.id)"
						class="h-auto bg-transparent"
					/>
				</div>
			</div>
		</div>

		<a
			class="block w-full border border-1 border-black rounded-full p-3 text-center bg-white"
			:href="$route('categories.articles', content.id)"
		>
			Vedi tutti
		</a>
	</div>
</template>

<script>
import Card from "~/Card";
import MiniCard from "~/MiniCard";

export default {
	components: {
		Card,
		MiniCard,
	},
	props: {
		content: Object,
	},
};
</script>