<template>
  <div>
    <div class="container mx-auto py-20" v-if="category">
      <span class="text-6xl align-middle">{{category.name}}</span>
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