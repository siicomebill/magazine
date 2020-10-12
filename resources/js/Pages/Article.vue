<template>
	<div>
		<div class="bg-black text-white shadow-2xl">
			<div class="mx-auto lg:grid grid-cols-2 gap-2 min-h-screen">
				<Thumbnail
					:src="article.image"
					:alt="article.title"
					square
					class="h-full text-center overflow-hidden"
				/>

				<div class="my-auto px-10 py-7">
					<a
						v-if="article.category"
						class="border-2 border-white rounded-full px-4 py-1 align-middle"
						:href="$route('categories.articles', article.category.id)"
					>
						{{ article.category.name }}
					</a>

					<h1 class="lg:text-6xl text-4xl align-middle my-2">
						{{ article.title }}
					</h1>

					<div class="my-4 rounded-lg">
						<div class="lg:text-xl text-lg">
							<p class="leading-none">{{ article.author.name }}</p>
						</div>
					</div>

					<hr class="my-6 lg:-mr-5" />

					<div>{{ article.snippet }}</div>
				</div>
			</div>
		</div>

		<div class="container mx-auto my-4 py-2 px-4 md:px-2">
			<MiniSponsorCard v-bind="sponsor" fixed class="w-1/2 mx-auto" />
			<Reader v-model="article.content" class="article content" />
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";
import Thumbnail from "~/Thumbnail";
import MiniSponsorCard from "~/MiniSponsorCard";
import { Reader } from "vue-publisher";

export default {
	layout: Layout,
	components: {
		Reader,
		Thumbnail,
		MiniSponsorCard,
	},
	props: {
		article: Object,
		sponsor: Object,
	},
};
</script>

<style>
</style>