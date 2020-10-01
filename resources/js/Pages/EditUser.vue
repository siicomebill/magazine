<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			User
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import { ListEditor } from "vue-publisher";

export default {
	layout: Layout,
	components: {
		ListEditor,
	},
	data() {
		return {
			edited: {},
		};
	},
};
</script>