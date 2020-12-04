<template>
	<div>
		<div class="text-white">
			<div class="mx-auto lg:grid grid-cols-2 gap-2 min-h-screen">
				<Thumbnail
					:src="article.image"
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

					<div v-if="article.published_at" class="py-4">
						<p class="capitalize">{{new Date(article.published_at).toLocaleDateString("it-IT", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}}</p>
					</div>

					<AuthorBadge v-bind="article.author" />

					<div class="mt-12">
						<Reactions
							:givenReactions="reactions"
							reactTo="article"
							:itemId="article.id"
						/>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-gray-200">
			<div
				class="container mx-auto md:py-4 lg:py-2 lg:px-4 px-0 lg:grid grid-cols-4 gap-2"
			>
				<div class="col-span-3">
					<Reader
						v-model="article.content"
						class="article content bg-white py-3 px-6 rounded-none lg:rounded-lg lg:shadow-lg"
					/>

					<div class="py-3">
						<ShareButtons :link="$route('articles.read', article.id)" class="justify-center"/>
					</div>

					<div v-if="suggested.ofCategory" class="pt-5">
						<p class="text-2xl text-center font-banner uppercase">
							<span class="font-banner text-primary">#</span>
							{{ article.category.name }}
						</p>
						<div class="md:grid md:grid-cols-2 lg:grid-cols-3 gap-4">
							<Card
								v-for="item in suggested.ofCategory"
								:key="item.id"
								v-bind="item"
								:href="$route('articles.read', item.id)"
								class="shadow-xl rounded-lg bg-white"
							/>
						</div>
					</div>
				</div>

				<div v-if="sponsors">
					<SponsorCard
						v-for="sponsor in sponsors"
						:key="sponsor.id"
						v-bind="sponsor"
						fixed
						class="w-full lg:11/12 mx-auto mt-0"
					/>
				</div>
			</div>
		</div>

		<div v-if="suggested.ofAuthor" class="bg-dark text-white banner">
			<div class="flex items-center pt-5">
				<div class="mx-auto md:flex items-center">
					<AuthorBadge v-bind="article.author" class="inline-block" />
				</div>
			</div>

			<div
				class="md:grid md:grid-cols-2 lg:grid-cols-4 gap-4 container mx-auto px-6"
			>
				<Card
					v-for="item in suggested.ofAuthor"
					:key="item.id"
					v-bind="item"
					:href="$route('articles.read', item.id)"
					class="shadow-xl rounded-lg"
				/>
			</div>
		</div>
	</div>
</template>

<script>
import Thumbnail from "~/Thumbnail";
import { Reader } from "vue-publisher";
import Reactions from "~/Reactions";
import AuthorBadge from "~/AuthorBadge";
import ShareButtons from "~/ShareButtons";

export default {
	components: {
		Reader,
		Thumbnail,
		SponsorCard: () => import("~/SponsorCard"),
		Reactions,
		AuthorBadge,
		Card: () => import("~/ImageCard"),
		ShareButtons,
	},
	props: {
		article: Object,
		sponsors: Array,
		reactions: Array,
		suggested: Object,
	},
};
</script>