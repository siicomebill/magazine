<template>
  <Card :title="name" :snippet="snippet" :image="image" :href="link">
    <template #footer>
      <div class="grid">
        <span class="bg-blue-500 text-white text-center font-bold rounded-full py-2 lg:pr-4 lg:pl-10 lg:-mr-12 lg:justify-self-end">{{ cta }}</span>
      </div>
    </template>
  </Card>
</template>

<script>
import Card from "~/Card";

export default {
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