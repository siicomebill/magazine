<template>
  <div>
    <div class="container mx-auto">
      <div
        class="w-full lg:flex bg-white rounded-lg p-4 my-4 shadow-md"
        v-for="article in articles"
        :key="article.id"
      >
        <div
          class="flex flex-col justify-between leading-normal"
        >
          <div class="mb-8">
            <p class="text-gray-900 font-bold text-2xl text-primary mb-2">{{article.title}}</p>
            <p class="text-gray-700 text-base">{{article.snippet}}</p>
          </div>
          <div class="flex items-center">
            <img
              class="w-10 h-10 rounded-full mr-4"
              v-if="article.author.profile_photo_path"
              :src="article.author.profile_photo_path"
            />
            <div class="text-sm">
              <p class="text-gray-900 leading-none">{{article.author.name}}</p>
              <p class="text-gray-600">Aug 18</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Reader } from "vue-publisher";
export default {
  components: {
    Reader,
  },
  props: {
    articles: Array,
  },
};
</script>