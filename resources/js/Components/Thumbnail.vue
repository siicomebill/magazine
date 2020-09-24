<template>
  <div class="relative">
    <div :class="`aspect-ratio-${aspectRatio}`"></div>
    <img :src="src" class="absolute left-0 top-0 bottom-0 right-0 w-full h-full object-cover" />
  </div>
</template>

<script>
export default {
  props: {
    aspectRatio: {
      type: String,
      default: "16:9"
    },
    src: String,
    alt: String,
  },
};
</script>