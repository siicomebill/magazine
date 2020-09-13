<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <form @submit.prevent="publish">
        <div class="mb-4">
          <input
            type="text"
            v-model="editedArticle.title"
            placeholder="Title"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
            :class="{ 'border border-red-500': error('title') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('title')">{{error('title')}}</span>
        </div>

        <div class="my-4">
          <textarea
            type="text"
            v-model="editedArticle.snippet"
            placeholder="Snippet"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-xl text-gray-700"
            :class="{ 'border border-red-500': error('snippet') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('snippet')">{{error('snippet')}}</span>
        </div>

        <div class="my-4">
          <Publisher
            v-model="editedArticle.content"
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
import { Publisher } from "vue-publisher";

export default {
  components: {
    Publisher,
  },
  methods: {
    async publish() {
      await this.$inertia.post(this.publishTo, this.editedArticle);
    },
  },
  props: {
    publishTo: String,
    stored: {
      type: [Object, Array],
      required: false
    },
  },
  data() {
    return {
      editedArticle: {
        title: "",
        snippet: "",
        content: {},
      },
    };
  },
  mounted(){
    this.editedArticle = this.editedArticle ?? this.stored
  }
};
</script>