<template>
  <div>
    <div class="container mx-auto py-20">
      <h1 class="text-6xl">Categorie</h1>
    </div>
    <a v-for="category in categories" :key="category.id" class="block py-10 bg-black text-white" :href="$route('categories.articles', category.id)">
      <div class="container mx-auto">
        <p class="text-4xl">{{category.name}}</p>
      </div>
    </a>
  </div>
</template>

<script>

export default {
  props: {
    categories: Array,
  },
};
</script>