<template>
	<div class="content-background">
		<div
			class="flex py-20 bg-black bg-fixed banner select-none md:min-h-0 text-white lg:rounded-br-full md:px-10 lg:px-0"
			:class="{ 'min-h-screen md:-mb-20 md:pb-40': config.banner || config.logo }"
		>
			<div class="container m-auto px-4 md:px-0">
				<div class="flex justify-items-center">
					<div
						class="mx-auto mb-auto lg:mb-0 lg:grid grid-cols-4"
						v-if="config.banner || config.logo"
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
						</div>
					</div>
				</div>

				<Reader
					v-if="config.banner"
					class="font-banner block text-center m-auto"
					v-model="config.banner"
				/>
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