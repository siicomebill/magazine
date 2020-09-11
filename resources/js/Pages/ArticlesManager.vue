<template>
  <div>
    <p v-for="article in articles" :key="article.id">{{article.title}}</p>
  </div>
</template>

<script>
export default {
  props: {
    articles: Array,
  },
};
</script>