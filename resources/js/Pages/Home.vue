<template>
	<div class="content-background">
		<div
			class="flex py-20 bg-black banner select-none md:min-h-0 text-white lg:rounded-br-full md:px-10 lg:px-0"
			:class="{ 'min-h-screen md:-mb-20 md:pb-40': config.banner }"
		>
			<div class="container m-auto px-4 md:px-0 flex justify-items-center">
				<div
					class="font-banner mx-auto mb-auto lg:mb-0 lg:grid grid-cols-4"
					v-if="config.banner"
				>
					<div v-if="config.logo" class="block mx-auto">
						<img
							:src="config.logo.small"
							class="logo-invert block m-auto lg:hidden"
							alt
						/>

						<img
							:src="config.logo.medium"
							class="logo-invert m-auto hidden lg:block"
							alt
						/>
					</div>

					<div class="col-span-3">
						<img :src="config.logo.big" class="logo-invert m-auto" alt />

						<Reader
							class="text-center m-auto"
							v-model="config.banner"
						/>
					</div>
				</div>
			</div>
		</div>

		<div class="md:hidden sticky bottom-0 px-6 py-4">
			<p class="cta">Scorri verso l'alto per le notizie</p>
		</div>

		<div>
			<div class="col-span-5 z-10" v-scroll-spy>
				<div v-for="(category, i) in categories" :key="category.id">
					<div class="container mx-auto bg-white rounded-lg shadow-lg p-6 mb-5">
						<a
							:href="$route('categories.articles', category.id)"
							class="block text-3xl font-banner text-center lg:text-left lg:text-6xl capitalize"
						>
							{{ category.name }}
						</a>
						<p v-if="category.snippet" class="text-gray-500 my-3">
							{{ category.snippet }}
						</p>
						<div>
							<div class="block grid-flow-cols gap-4">
								<div class="xl:grid grid-cols-3 gap-2">
									<MiniCard
										class="col-span-2"
										v-bind="category.articles[0]"
										:href="$route('articles.read', category.articles[0].id)"
									/>

									<div>
										<MiniCard
											v-bind="article"
											v-for="article in category.articles.slice(1, 3)"
											:key="article.id"
											:href="$route('articles.read', article.id)"
											class="h-auto bg-transparent"
										/>
									</div>
								</div>

								<div class="md:grid md:grid-cols-3 lg:grid-cols-5 gap-2">
									<Card
										v-bind="article"
										v-for="article in category.articles.slice(3)"
										:key="article.id"
										:href="$route('articles.read', article.id)"
										class="h-auto bg-transparent"
									/>
								</div>
							</div>
						</div>

						<a
							class="block w-full border border-1 border-black rounded-full p-3 text-center bg-white"
							:href="$route('categories.articles', category.id)"
						>
							Vedi tutti
						</a>
					</div>

					<div class="container mx-auto">
						<MiniSponsorCard
							v-if="sponsors[i]"
							v-bind="sponsors[i]"
							class="lg:w-11/12 mx-auto"
						/>
					</div>
				</div>
			</div>
		</div>

		<div class="container mx-auto" v-if="articles.length">
			<p class="text-center text-4xl text-gray-500 my-4">Esplora</p>
			<MiniCard
				v-bind="article"
				v-for="article in articles"
				:key="article.id"
				:href="$route('articles.read', article.id)"
			/>
		</div>
	</div>
</template>

<script>
import Card from "~/Card";
import MiniCard from "~/MiniCard";
import SponsorCard from "~/SponsorCard";
import MiniSponsorCard from "~/MiniSponsorCard";
import Dropdown from "~/Dropdown";
import Layout from "@/Layouts/PublicLayout";
import { Reader } from "vue-publisher";

export default {
	layout: Layout,
	components: {
		Card,
		MiniCard,
		SponsorCard,
		MiniSponsorCard,
		Dropdown,
		Reader,
	},
	props: {
		sponsors: Array,
		categories: Array,
		navbarCategories: Array,
		articles: Array,
		config: [Object, Array],
	},
};
</script>

<style scoped>
/*TODO Separate into dedicated class with theme colors */
.banner {
	background-color: #000000;
	background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.16'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.content-background {
	background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.02'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E") !important;
}
</style>