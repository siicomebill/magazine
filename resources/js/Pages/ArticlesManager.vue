<template>
  <div>
    <div v-for="article in articles" :key="article.id">
      <p>{{article.title}}</p>
      <p>{{article.snippet}}</p>
      <Reader v-model="article.content" />
    </div>
  </div>
</template>

<script>
import { Reader } from 'vue-publisher'
export default {
  components: {
    Reader
  },
  props: {
    articles: Array,
  },
};
</script>