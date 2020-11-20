<template>
	<div>
		<div class="class container mx-auto my-4 rounded-lg p-4">
			<form @submit.prevent="publish">
				<div class="mb-4 lg:flex gap-4">
					<div class="flex-grow">
						<div>
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
							<span
								class="text-red-500 text-sm italic"
								v-if="error('snippet')"
								>{{ error("snippet") }}</span
							>
						</div>

						<div class="my-4 lg:flex gap-4">
							<div class="my-4">
								<select
									class="bg-white rounded-lg p-4 shadow"
									v-model="edited.category_id"
								>
									<option disabled :selected="!edited.category_id">
										Categoria
									</option>
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
								<input
									placeholder="Data pubblicazione"
									type="datetime-local"
									class="bg-white rounded-lg p-4 shadow"
									:class="{ 'border border-red-500': error('published_at') }"
									v-model="edited.published_at"
								/>
								<span
									class="text-red-500 text-sm italic"
									v-if="error('published_at')"
									>{{ error("published_at") }}</span
								>
							</div>
						</div>
					</div>

					<div>
						<UploadButton
							title="Thumbnail"
							:class="{ 'border border-red-500': error('image') }"
							:img="edited.image ? edited.image.name : ''"
							@change="processFile"
						/>
						<span class="text-red-500 text-sm italic" v-if="error('image')">{{
							error("image")
						}}</span>
					</div>
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
import UploadButton from "~/UploadButton";

export default {
	layout: Layout,
	extends: Form,
	components: {
		Publisher,
		UploadButton,
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
				published_at: null,
			},
		};
	},
	methods: {
		processFile(e) {
			this.edited.image = e.target.files[0];
		},
		prepareData(edited) {
			let data = new FormData();

			Object.keys(this.edited).forEach((key) => {
				if (typeof edited[key] === "object" && !(edited[key] instanceof File))
					data.append(key, JSON.stringify(edited[key]));
				else data.append(key, edited[key]);
			});

			return data;
		},
	},
};
</script>