<template>
	<div>
		<div class="bg-black text-white xl:py-64 py-20">
			<div class="container mx-auto px-4">
				<div class="text-center">
					<h1 class="my-auto font-banner capitalize text-6xl">
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

			<div
				class="container mx-auto my-6 md:grid md:grid-cols-3 lg:grid-cols-4 gap-3"
				v-if="page.details"
			>
				<div v-for="(person, i) in page.details.people" :key="i">
					<Card
						:title="person.name"
						:snippet="person.desc"
						:author="{ name: person.role }"
						:image="person.pic"
					/>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";
import { Reader } from "vue-publisher";
import Card from "~/Card";
import PageComponentContainer from "~/PageComponentContainer";

export default {
	layout: Layout,
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