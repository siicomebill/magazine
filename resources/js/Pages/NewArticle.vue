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
          <span class="text-red-500 text-sm italic" v-if="error('title')">{{error('title')}}</span>
        </div>

        <div class="my-4">
          <input
            type="text"
            v-model="edited.image"
            placeholder="Link to image"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-gray-700"
            :class="{ 'border border-red-500': error('image') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('image')">{{error('image')}}</span>
        </div>

        <div class="my-4">
          <textarea
            type="text"
            v-model="edited.snippet"
            placeholder="Snippet"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-xl text-gray-700"
            :class="{ 'border border-red-500': error('snippet') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('snippet')">{{error('snippet')}}</span>
        </div>

        <div class="my-4">
          <select class="bg-white rounded-lg p-4 shadow" v-model="edited.category_id">
            <option disabled :selected="!edited.category_id">Categoria</option>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
          </select>
          <span class="text-red-500 text-sm italic" v-if="error('category_id')">{{error('category_id')}}</span>
        </div>

        <div class="my-4">
          <Publisher
            v-model="edited.content"
            class="shadow rounded-lg p-2 bg-white"
            :class="{ 'border border-red-500': error('snippet') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('content')">{{error('content')}}</span>
        </div>

        <button
          type="submit"
          class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4"
        >Publish</button>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from '@/Layouts/AppLayout'
import Form from '~/Base/Form'
import { Publisher } from "vue-publisher"

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
    }
  }
}
</script>