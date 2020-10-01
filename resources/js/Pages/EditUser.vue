<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<h1 class="text-3xl">{{edited.name}}</h1>
			<h2 class="text-xl">{{edited.email}}</h2>

			<div class="my-4">
				<a :href="$route('user.roles.write', edited.id)" class="block bg-white rounded-lg shadow-lg p-4 w-full font-bold mb-4">Modifica ruoli</a>
				<a :href="$route('articles.ofUser.list', edited.id)" class="block bg-white rounded-lg shadow-lg p-4 w-full font-bold mb-4">Gestisci articoli</a>
			</div>
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from '~/Base/Form';

export default {
	layout: Layout,
	extends: Form,
	data() {
		return {
			edited: {},
		};
	},
};
</script>