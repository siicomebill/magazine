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
				<div v-for="(article, i) in articles" :key="article.id">
					<div class="xl:grid grid-cols-5 gap-4 items-center">
						<ArticleCard :class="{'col-span-3': sponsors[i], 'col-span-5': !sponsors[i], 'order-1': i % 2 == 0}" v-bind="article"/>

						<SponsorCard
							v-if="sponsors[i]"
							class="col-span-2"
							v-bind="sponsors[i]"
						/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { Reader } from "vue-publisher";

export default {
	components: {
		ArticleCard: () => import("~/ArticleCard"),
		SponsorCard: () => import("~/MiniSponsorCard"),
		Dropdown: () => import("~/Dropdown"),
		CategoryCard: () => import("~/CategoryCard"),
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