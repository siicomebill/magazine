<template>
	<div>
		<div
			class="flex py-20 select-none md:min-h-0 text-white md:px-10 lg:px-0"
			v-if="config.banner || config.logo"
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
					class="font-handwritten block text-center m-auto mt-4"
					v-model="config.banner"
				/>
			</div>
		</div>

		<div class="container mx-auto" v-if="articles.length">
			<div class="sm:grid xl:grid-cols-1 grid-flow-rows gap-4">
				<div
					v-for="(article, i) in articles"
					:key="article.id"
					class="xl:grid grid-cols-4 gap-4 items-center"
				>
					<div class="col-span-3">
						<ArticleCard
							v-bind="article"
							:href="$route('articles.read', article.id)"
						/>
					</div>

					<div v-if="sponsors[i]">
						<SponsorCard v-bind="sponsors[i]" />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import ArticleCard from "~/ArticleCard";
import SponsorCard from "~/MiniSponsorCard";
import Dropdown from "~/Dropdown";
import { Reader } from "vue-publisher";
import CategoryCard from "~/CategoryCard";

export default {
	components: {
		ArticleCard,
		SponsorCard,
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