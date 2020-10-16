<template>
  <div class="relative block">
    <div :class="{'aspect-ratio-square': square}"></div>
    <img v-if="src" v-lazy="src" :class="[baseImageClass, imageClass, {'absolute inset-0': square}]" :alt="alt || 'Thumbnail'"/>

    <div v-else-if="alt" :class="[baseImageClass, imageClass, {'absolute inset-0': square}]">
      <span class="m-auto block text-gray-500 text-4xl">{{alt}}</span>
    </div>

    <div v-else :class="[baseImageClass, imageClass]">
      <div class="m-auto block">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      baseImageClass: "flex object-cover",
    }
  },
  props: {
    imageClass: {
      type: String,
      default: "w-full h-full",
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