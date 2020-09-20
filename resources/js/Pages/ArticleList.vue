<template>
  <div>
    <div class="container mx-auto my-5">
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