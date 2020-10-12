<template>
  <div class="relative block">
    <div :class="{'aspect-ratio-square': square}"></div>
    <img v-if="src" v-lazy="src" :class="imageClass" :alt="alt || 'Thumbnail'"/>

    <div v-else-if="alt" :class="imageClass">
      <span class="m-auto block text-gray-500 text-4xl">{{alt}}</span>
    </div>

    <div v-else :class="imageClass">
      <div class="m-auto block">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    imageClass: {
      type: String,
      default: "flex absolute left-0 top-0 bottom-0 right-0 w-full h-full object-cover",
    },
    square: {
      type: Boolean,
      default: false
    },
    src: String,
    alt: String,
  },
};
</script>