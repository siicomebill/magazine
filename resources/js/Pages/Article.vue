<template>
  <div>
    <div class="bg-black rounded-b-lg text-white shadow-2xl lg:mb-24">
      <div
        class="container mx-auto px-4 md:px-0 py-10 lg:grid grid-cols-2 gap-2"
      >
        <div class="my-auto">
          <a
            v-if="article.category"
            class="border-2 border-white rounded-full px-4 py-1 align-middle"
            :href="$route('categories.articles', article.category.id)"
          >
            {{ article.category.name }}
          </a>

          <h1 class="lg:text-6xl text-4xl align-middle my-2">
            {{ article.title }}
          </h1>

          <div class="my-4 rounded-lg">
            <!-- <img
              class="w-10 h-10 rounded-full mr-4"
              v-if="article.author.profile_photo_path"
              :alt="article.author.name[0]"
              :src="article.author.profile_photo_path"
            /> -->
            <div class="lg:text-xl text-lg">
              <p class="leading-none">{{ article.author.name }}</p>
            </div>
          </div>

          <hr class="my-6 lg:-mr-5" />

          <div>{{ article.snippet }}</div>
        </div>

        <div class="lg:-mb-24">
          <Thumbnail
            :src="article.image"
            :alt="article.title"
            square
            class="w-auto rounded-lg text-center overflow-hidden"
          />
        </div>
      </div>
    </div>

    <div class="container mx-auto my-4 py-2 px-4 md:px-2">
      <MiniSponsorCard v-bind="sponsor" class="lg:w-1/2 mx-auto"/>
      <Reader v-model="article.content" class="article content"/>
    </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";
import Thumbnail from "~/Thumbnail";
import MiniSponsorCard from "~/MiniSponsorCard";
import { Reader } from "vue-publisher";

export default {
  layout: Layout,
  components: {
    Reader,
    Thumbnail,
    MiniSponsorCard,
  },
  props: {
    article: Object,
    sponsor: Object,
  },
};
</script>

<style>
</style>