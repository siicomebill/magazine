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

					<hr class="my-6 lg:-mr-5" />

					<div>{{ article.snippet }}</div>

					<AuthorBadge v-bind="article.author" />

					<div class="mt-12">
						<Reactions :givenReactions="reactions" reactTo="article" :itemId="article.id"/>
					</div>
				</div>
			</div>
		</div>

		<div class="container mx-auto md:my-4 lg:py-2 lg:px-4 px-0 lg:grid grid-cols-4 gap-2">
			<div class="col-span-3">
				<Reader v-model="article.content" class="article content bg-white p-3 rounded-none lg:rounded-lg lg:shadow-lg" />
			</div>

			<div>
				<SponsorCard v-bind="sponsor" fixed class="w-full lg:11/12 mx-auto mt-0" />
			</div>
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";
import Thumbnail from "~/Thumbnail";
import SponsorCard from "~/SponsorCard";
import { Reader } from "vue-publisher";
import Reactions from "~/Reactions";
import AuthorBadge from "~/AuthorBadge";

export default {
	layout: Layout,
	components: {
		Reader,
		Thumbnail,
		SponsorCard,
		Reactions,
		AuthorBadge,
	},
	props: {
		article: Object,
		sponsor: Object,
		reactions: Array,
	},
};
</script>

<style>
</style>