<template>
  <div>
    <a v-for="category in categories" :key="category.id" class="block py-10 px-5 bg-dark text-white" :href="$route('categories.articles', category.id)">
      <div class="container mx-auto">
        <p class="text-4xl font-banner">{{category.name}}</p>
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