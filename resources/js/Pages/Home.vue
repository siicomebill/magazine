<template>
  <div>
    <div class="py-20 bg-black banner text-white -mb-10 pb-30 rounded-br-full md:px-10 lg:px-0">
      <div class="container mx-auto">
        <h1 class="text-6xl font-bold">Sii Come Bill</h1>
        <p
          class="text-md"
        >This is just a demo, the content and the graphics will be worked on in the end. Here is where the slogan will be</p>
      </div>
    </div>
    <div class="container mx-auto lg:grid grid-cols-3 gap-4">
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
    articles: Array,
  },
};
</script>

<style scoped>
.banner {
  background-color: #000000;
  background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.16'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>