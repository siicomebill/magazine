<template>
	<div>
		<div
			class="flex py-20 select-none md:min-h-0 text-white md:px-10 lg:px-0"
		>
			<div class="container m-auto px-4 md:px-0">
				<div class="flex items-center" v-if="config.logo">
					<div class="mx-auto mb-auto lg:mb-0 lg:grid grid-cols-2 items-center">
						<div class="block mx-auto">
							<img
								:src="config.logo.medium"
								class="m-auto hidden lg:block max-h-64"
								alt
							/>
						</div>

						<div class="col-span-1">
							<img :src="config.logo.big" class="m-auto max-h-64" alt />
						</div>
					</div>
				</div>

				<Reader
					v-if="config.banner"
					class="font-banner block text-center m-auto mt-4"
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
					<CategoryCard :content="category" />

					<div class="container mx-auto">
						<MiniSponsorCard
							v-if="sponsors[i]"
							v-bind="sponsors[i]"
							class="lg:w-1/2 mx-auto"
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
import MiniCard from "~/MiniCard";
import SponsorCard from "~/SponsorCard";
import MiniSponsorCard from "~/MiniSponsorCard";
import Dropdown from "~/Dropdown";
import { Reader } from "vue-publisher";
import CategoryCard from "~/CategoryCard";

export default {
	components: {
		MiniCard,
		SponsorCard,
		MiniSponsorCard,
		Dropdown,
		Reader,
		CategoryCard,
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