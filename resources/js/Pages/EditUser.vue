<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<form @submit.prevent="publish">
				<ListEditor v-model="edited.roles" :default="{ name: '' }">
					<template #item="{ item }">
						<span class=" text-3xl mb-4 font-bold text-center text-gray-500 shadow rounded-lg p-2 bg-white lg:w-1/2">
							{{item.name}}
						</span>
					</template>
				</ListEditor>

				<button
					type="submit"
					class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4"
				>
					Save
				</button>
			</form>
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