<template>
	<div>
		<div class="bg-black text-white xl:py-32 py-20 banner">
			<div class="container mx-auto px-4">
				<div class="text-center">
					<h1 class="my-auto font-banner capitalize text-3xl">
						{{ page.name }}
					</h1>
				</div>
			</div>
		</div>

		<div class="px-4">
			<div class="container mx-auto my-6 lg:w-1/2" v-if="page.content">
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
import Card from "~/Card";
import PageComponentContainer from "~/PageComponentContainer";

export default {
	props: {
		content: {},
	},
	components: {
		Reader,
		Card,
		PageComponentContainer,
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