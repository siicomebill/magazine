<template>
  <div>
    <div class="bg-black rounded-b-lg text-white shadow-2xl lg:mb-24">
      <div
        class="container mx-auto px-4 md:px-0 py-10 lg:grid grid-cols-2 gap-2"
      >
        <div class="my-auto">
          <span
            v-if="article.category"
            class="border-2 border-white rounded-full px-4 py-1 align-middle"
            >{{ article.category.name }}</span
          >

          <h1 class="text-6xl align-middle">{{ article.title }}</h1>

          <div class="my-4 rounded-lg">
            <!-- <img
              class="w-10 h-10 rounded-full mr-4"
              v-if="article.author.profile_photo_path"
              :alt="article.author.name[0]"
              :src="article.author.profile_photo_path"
            /> -->
            <div class="text-xl">
              <p class="leading-none">{{ article.author.name }}</p>
            </div>
          </div>

          <hr class="my-6 w-11/12 mx-auto" />

          <div>{{ article.snippet }}</div>
        </div>

        <div class="lg:-mb-24">
          <Thumbnail
            :src="article.image"
            :alt="article.title"
            aspectRatio="square"
            class="w-auto rounded-lg text-center overflow-hidden"
          />
        </div>
      </div>
    </div>

    <Reader
      v-model="article.content"
      class="container mx-auto my-4 py-2 px-4 md:px-2"
    />
  </div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";
import Thumbnail from "~/Thumbnail";
import { Reader } from "vue-publisher";

export default {
  layout: Layout,
  components: {
    Reader,
    Thumbnail,
  },
  props: {
    article: Object,
  },
};
</script>

<style>
</style>