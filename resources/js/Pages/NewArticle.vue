<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<form @submit.prevent="publish">
				<div class="mb-4">
					<input
						type="text"
						v-model="edited.title"
						placeholder="Title"
						class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
						:class="{ 'border border-red-500': error('title') }"
					/>
					<span class="text-red-500 text-sm italic" v-if="error('title')">{{
						error("title")
					}}</span>
				</div>

				<div class="my-4">
					<textarea
						type="text"
						v-model="edited.snippet"
						placeholder="Snippet"
						class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-xl text-gray-700"
						:class="{ 'border border-red-500': error('snippet') }"
					/>
					<span class="text-red-500 text-sm italic" v-if="error('snippet')">{{
						error("snippet")
					}}</span>
				</div>

				<div class="my-4">
					<select
						class="bg-white rounded-lg p-4 shadow"
						v-model="edited.category_id"
					>
						<option disabled :selected="!edited.category_id">Categoria</option>
						<option
							v-for="category in categories"
							:key="category.id"
							:value="category.id"
						>
							{{ category.name }}
						</option>
					</select>
					<span
						class="text-red-500 text-sm italic"
						v-if="error('category_id')"
						>{{ error("category_id") }}</span
					>
				</div>

				<div class="my-4">
					<Publisher
						v-model="edited.content"
						class="article shadow rounded-lg p-2 bg-white"
						:class="{ 'border border-red-500': error('content') }"
					/>
					<span class="text-red-500 text-sm italic" v-if="error('content')">{{
						error("content")
					}}</span>
				</div>

        <div class="my-4">
					<label
            :class="{ 'border border-red-500': error('image') }"
						class="w-64 flex flex-col items-center px-4 py-6 bg-white text-black rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-black hover:text-white"
					>
						<svg
							class="w-8 h-8"
							fill="currentColor"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 20 20"
						>
							<path
								d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
							/>
						</svg>
						<span class="mt-2 text-base leading-normal">Thumbnail</span>
            <span v-if="edited.image" class="mt-2 text-gray-500 text-sm uppercase italic leading-normal">{{edited.image.name}}</span>
						<input
							type="file"
							@change="processFile"
							placeholder="Thumbnail"
							class="hidden"
						/>
					</label>
					<span class="text-red-500 text-sm italic" v-if="error('image')">{{
						error("image")
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
	components: {
		Publisher,
	},
	props: {
		categories: Array,
	},
	data() {
		return {
			edited: {
				title: "",
				snippet: "",
				content: {},
				category_id: "",
				image: "",
			},
		};
	},
	methods: {
		processFile(e) {
			this.edited.image = e.target.files[0];
		},
		prepareData(edited) {
			let data = new FormData();

			data.append("title", edited.title);
			data.append("snippet", edited.snippet);
			data.append("content", JSON.stringify(edited.content));
			data.append("category_id", edited.category_id);
			data.append("image", edited.image);

			return data;
		},
	},
};
</script>