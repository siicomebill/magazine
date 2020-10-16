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

			<div
				class="container mx-auto my-6 md:grid md:grid-cols-3 lg:grid-cols-4"
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

export default {
	layout: Layout,
	props: {
		content: {},
	},
	components: {
		Reader,
		Card,
	},
	computed: {
		page() {
			return {
				name: "about",
				content: this.content.about.content,
				details: this.content.about.details,
			};
		},
	},
};
</script>