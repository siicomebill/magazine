<template>
  <div>
    <div class="py-20 bg-gray-800 text-white">
      <div class="container mx-auto">
        <h1 class="text-6xl">Bill</h1>
        <p class="text-sm">This is just a demo, the content and the graphics will be worked on in the end.</p>
      </div>
    </div>
    <div class="container mx-auto grid grid-cols-3 gap-4">
      <Card v-bind="article" v-for="article in articles" :key="article.id" />
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
    articles: Array,
  },
};
</script>