<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<p>List editor</p>
			<ListEditor v-model="edited.roles" :default="{ name: '' }">
				<template #item="{ item }">{{ item.name }}</template>
			</ListEditor>
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from "~/Base/Form";
import { ListEditor } from "vue-publisher";

export default {
	layout: Layout,
	extends: Form,
	components: {
		ListEditor,
	},
	props: {
		roles: Array,
	},
	data() {
		return {
			edited: {
				roles: [],
			},
		};
	},
};
</script>