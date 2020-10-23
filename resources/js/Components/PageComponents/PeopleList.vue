<template>
	<div
		class="container mx-auto my-6 md:grid md:grid-cols-3 lg:grid-cols-4 gap-3"
		v-if="content"
	>
		<div v-for="(person, i) in content" :key="i">
			<Card
				:title="person.name"
				:snippet="person.desc"
				:author="{ name: person.role }"
				:image="person.pic"
			/>
		</div>
	</div>
</template>

<script>
import PageComponent from "~/Base/PageComponent"
import Card from "~/Card";

export default {
	extends: PageComponent,
    components: {
        Card,
    }
};
</script>