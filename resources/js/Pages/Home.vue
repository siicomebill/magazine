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

		<div class="container mx-auto" v-if="articles.data.length">
			<div class="sm:grid xl:grid-cols-1 grid-flow-rows gap-4">
				<div v-for="(article, i) in articles.data" :key="article.id">
					<div class="xl:grid grid-cols-5 gap-4 items-center">
						<ArticleCard
							:class="{
								'col-span-3': showSponsor(i),
								'col-span-5': !showSponsor(i),
								'order-1': i % 2 == 0,
							}"
							v-bind="article"
						/>

						<SponsorCard
							v-if="showSponsor(i)"
							class="col-span-2 xl:w-auto lg:w-1/2 xl:mx-0 mx-auto"
							v-bind="sponsors[s()]"
						/>
					</div>
				</div>
			</div>

			<div
				class="grid grid-cols-3 gap-4 font-banner uppercase text-center items-center py-10"
			>
				<span>
					<a
						v-if="articles.prev_page_url"
						class="bg-primary rounded-full py-4 px-6"
						:href="articles.prev_page_url"
						>Indietro</a
					>
				</span>

				<span>
					<a
						v-if="articles.next_page_url || articles.prev_page_url"
						class="bg-dark border-2 border-primary rounded-full py-4 px-6 text-white"
						>{{ articles.current_page }}</a
					>
				</span>

				<span>
					<a
						v-if="articles.next_page_url"
						class="bg-primary rounded-full py-4 px-6"
						:href="articles.next_page_url"
						>Prossimo</a
					>
				</span>
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
		articles: Object,
		config: [Object, Array],
	},
	data() {
		return {
			articlesBetweenSponsors: 3,
			sponsorIndex: 0,
		};
	},
	methods: {
		showSponsor(i) {
			return i % this.articlesBetweenSponsors === 0;
		},
		s() {
			let i = this.sponsorIndex;

			if (i < this.sponsors.length) this.sponsorIndex++;

			return i;
		},
	},
};
</script>