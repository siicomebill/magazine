<template>
	<a
		class="block my-4 rounded-lg bg-dark text-white items-center grid-cols-4 border-2 border-white overflow-hidden"
		:class="{ 'block': fixed, 'block lg:grid': !fixed, }"
		:href="$route('articles.read', identifier)"
		:target="target"
		:rel="rel"
	>
		<Thumbnail
			v-if="image"
			:src="image"
			square
			:class="{'h-full lg:border-r-2 lg:border-b-0 lg:rounded-r-0': !fixed}"
			class="text-center overflow-hidden border-white border-b-2"
		/>
		<div
			class="col-span-3 flex flex-col p-4 justify-between leading-normal w-full break-normal"
		>
			<div
				v-if="category"
				class="items-center text-center lg:text-left lg:flex gap-4"
			>
				<a
					v-if="category.parent"
					:href="$route('categories.articles', category.parent.id)"
					class="block text-xl font-banner capitalize mb-3 lg:mb-0"
				>
					<span class="text-primary">#</span>
					<span>{{ category.parent.name }}</span>
				</a>

				<div>
					<a
						:href="$route('categories.articles', category.id)"
						class="bg-primary py-1 px-4 text-black rounded-full font-banner uppercase text-lg"
					>
						{{ category.name }}
					</a>
				</div>
			</div>

			<div class="mt-4">
				<p class="font-banner text-xl xl:text-3xl mb-2 break-words">
					{{ title }}
				</p>
				<div class="my-3" v-if="snippet">
					<div class="mb-3">
						<p class="leading-none">{{ snippet }}</p>
					</div>
				</div>

				<div>
					<slot></slot>
				</div>
			</div>

			<div class="text-4xl" v-if="author">
				<AuthorBadge v-bind="author" />
			</div>

			<div>
				<slot name="footer"></slot>
			</div>
		</div>
	</a>
</template>

<script>
import Card from "~/Card";
import AuthorBadge from "~/AuthorBadge";
import ResourceWithSlug from "@/Mixins/ResourceWithSlug";

export default {
	mixins: [
		ResourceWithSlug,
	],
	extends: Card,
	components: {
		AuthorBadge,
	},
	props: {
		fixed: {
			type: Boolean,
			default: false,
		},
		category: Object,
	},
};
</script>