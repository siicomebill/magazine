<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <form @submit.prevent="publish">
        <input
          type="text"
          v-model="article.title"
          placeholder="Title"
          class="appearance-none bg-white shadow border-none w-full leading-tight p-4 mb-4 rounded-lg text-3xl font-bold text-gray-700"
        />

        <textarea
          type="text"
          v-model="article.snippet"
          placeholder="Snippet"
          class="appearance-none bg-white shadow border-none w-full leading-tight p-4 my-4 rounded-lg text-xl text-gray-700"
        />

        <Publisher class="shadow rounded-lg p-2 bg-white" v-model="article.content" />

        <button type="submit" class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4">Publish</button>
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
    publish() {
      console.log(this.article);
    },
  },
  data() {
    return {
      article: {
        title: "",
        snippet: "",
        content: {},
      },
    };
  },
};
</script>