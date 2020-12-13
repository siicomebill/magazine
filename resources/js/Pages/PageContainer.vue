<template>
	<div>
		<div class="text-white xl:py-32 py-20">
			<div class="container mx-auto px-4">
				<div class="text-center">
					<h1 class="my-auto font-banner capitalize text-3xl">
						{{ page.name }}
					</h1>
				</div>
			</div>
		</div>

		<div class="px-4 bg-white">
			<div class="container mx-auto py-6 lg:w-1/2" v-if="page.content">
				<Reader v-model="page.content" class="article content" />
			</div>

			<PageComponentContainer
				v-for="component in page.components"
				:key="component.id"

				:name="component.name"
				:propertyName="component.propertyName"
				:data="page.details"
			/>
		</div>
	</div>
</template>

<script>
import { Reader } from "vue-publisher";

export default {
	props: {
		content: {},
	},
	components: {
		Reader,
		Card: () => import("~/Card"),
		PageComponentContainer: () => import("~/PageComponentContainer"),
	},
	computed: {
		page() {
			return {
				name: this.content.name,
				content: this.content.content,
				details: this.content.details,
				components: this.content.components,
			};
		},
	},
};
</script>