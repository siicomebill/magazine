<template>
  <div>
    <div class="container mx-auto py-20">
      <h1 class="text-6xl">Categorie</h1>
    </div>
    <div v-for="category in categories" :key="category.id" class="py-10 bg-black text-white">
      <div class="container mx-auto">
        <p class="text-4xl">{{category.name}}</p>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout";

export default {
  layout: Layout,
  props: {
    categories: Array,
  },
};
</script>