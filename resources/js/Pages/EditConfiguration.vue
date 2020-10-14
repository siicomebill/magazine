<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<form @submit.prevent="publish">
				<div class="mb-4">
					<input
						type="text"
						v-model="edited.name"
						placeholder="name"
						class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
						:class="{ 'border border-red-500': error('name') }"
					/>
					<span class="text-red-500 text-sm italic" v-if="error('name')">{{
						error("name")
					}}</span>
				</div>

				<div class="my-4">
					<div>
						<Publisher
							v-model="edited.content"
							class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-xl text-gray-700"
							:class="{ 'border border-red-500': error('content') }"
						/>

						<JsonEditor
              class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-xl"
							:options="{
								confirmText: 'confirm',
								cancelText: 'cancel',
							}"
							:objData="edited.content"
							v-model="edited.content"
						>
						</JsonEditor>
					</div>

					<span class="text-red-500 text-sm italic" v-if="error('content')">{{
						error("content")
					}}</span>
				</div>

				<button
					type="submit"
					class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4"
				>
					Publish
				</button>
			</form>
		</div>
	</div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from "~/Base/Form";
import { Publisher } from "vue-publisher";

export default {
	layout: Layout,
	extends: Form,
	props: {
		categories: Array,
	},
	components: {
		Publisher,
	},
	data() {
		return {
			edited: {
				name: "",
				content: {},
			},
		};
	},
};
</script>