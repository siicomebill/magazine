<template>
  <div>
    <div class="container mx-auto py-20">
      <span class="text-6xl align-middle">{{category.name}}</span>
      <span class="border-2 border-black rounded-full bg-white px-4 py-1 align-middle mx-5">Categoria</span>
    </div>

    <div class="container mx-auto my-5">
      <Card v-bind="article" v-for="article in articles" :key="article.id" :href="$route('articles.read', article.id)"/>
    </div>
  </div>
</template>

<script>
import Card from "~/Card";
import Layout from "@/Layouts/PublicLayout";

export default {
  layout: Layout,
  components: {
    Card,
  },
  props: {
    category: Object,
    articles: Array,
  },
};
</script>