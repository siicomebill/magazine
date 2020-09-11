<template>
  <div>
    <div class="container mx-auto">
      <Card v-bind="article" v-for="article in articles" :key="article.id" />
    </div>
  </div>
</template>

<script>
import Card from "~/Card";
export default {
  components: {
    Card,
  },
  props: {
    articles: Array,
  },
};
</script>