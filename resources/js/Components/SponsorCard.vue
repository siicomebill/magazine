<template>
  <div class="p-2">
    <Card :title="name" :image="image" :href="link" class="mb-1 shadow-lg rounded-lg bg-white text-black" outsider>
      <span class="block">{{ snippet }}</span>

      <template #footer>
        <div class="grid">
          <a
            :href="link"
            rel="sponsored"
            class="bg-primary text-white text-center font-bold rounded-full lg:rounded-r-none py-2 px-4 lg:text-xl lg:-mr-4 lg:mb-4 lg:pr-12 lg:justify-self-end shadow"
          >
            {{ cta }}
          </a>
        </div>
      </template>
    </Card>

    <span class="text-sm text-gray-500">Sponsor</span>
  </div>
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