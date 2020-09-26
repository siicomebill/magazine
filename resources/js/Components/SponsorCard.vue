<template>
  <Card :title="name" :snippet="snippet" :image="image" :href="link">
    <template #footer>
        <span class="button">{{cta}}</span>
    </template>
  </Card>
</template>

<script>
import Card from "~/Card";

export default {
  extends: Card,
  components: {
    Card,
  },
  props: {
    name: {
      type: String,
      required: true,
    },
    snippet: String,
    cta: {
      type: String,
      default: "Visita",
    },
    image: String,
    link: {
      type: String,
      required: true,
    },
  },
};
</script>