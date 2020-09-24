<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <form @submit.prevent="publish">
        <div class="mb-4">
          <input
            type="text"
            v-model="edited.name"
            placeholder="Name"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
            :class="{ 'border border-red-500': error('name') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('name')">{{error('name')}}</span>
        </div>

        <div class="my-4">
          <input
            type="text"
            v-model="edited.link"
            placeholder="Link"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-gray-700"
            :class="{ 'border border-red-500': error('link') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('link')">{{error('link')}}</span>
        </div>

        <div class="my-4">
          <input
            type="text"
            v-model="edited.image"
            placeholder="Image URL"
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
          <input
            v-model="edited.cta"
            placeholder="Call to action"
            class="shadow rounded-lg p-2 bg-white"
            :class="{ 'border border-red-500': error('cta') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('cta')">{{error('cta')}}</span>
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

export default {
  layout: Layout,
  extends: Form,
  props: {
    categories: Array,
  },
  data() {
    return {
      edited: {
        name: "",
        snippet: "",
        cta: "",
        image: "",
        link: "",
      },
    }
  }
}
</script>