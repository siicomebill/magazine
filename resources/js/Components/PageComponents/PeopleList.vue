<template>
	<div class="container mx-auto my-6" v-if="content">
		<p class="font-banner text-3xl text-center">Le menti dietro il magazine</p>
		<div class="md:grid md:grid-cols-3 lg:grid-cols-4 gap-3">
			<div v-for="(person, i) in content" :key="i">
				<Card
					:title="person.name"
					:snippet="person.desc"
					:author="{ name: person.role }"
					:image="person.pic"
				/>
			</div>
		</div>
	</div>
</template>

<script>
import PageComponent from "~/Base/PageComponent";
import Card from "~/Card";

export default {
	extends: PageComponent,
	components: {
		Card,
	},
};
</script>