<template>
  <a
    class="block w-full bg-white rounded-lg my-4 shadow-xl"
    :href="href"
  >
    <Thumbnail
      :src="image"
      :alt="title"
      aspectRatio="square"
      class="w-auto rounded-t-lg text-center overflow-hidden"
    />
    <div class="flex flex-col p-4 w-50 justify-between leading-normal">
      <div class="mb-8">
        <p class="font-bold text-2xl text-primary mb-2">{{ title }}</p>
        <p class="text-gray-700 text-base">{{ snippet }}</p>
        <div class="my-3">
          <!-- <img
            class="w-10 h-10 rounded-full mr-4"
            v-if="author.profile_photo_path"
            :alt="author.name[0]"
            :src="author.profile_photo_path"
          /> -->
          <div class="text-sm">
            <p class="text-gray-500 leading-none">{{ author.name }}</p>
          </div>
        </div>

        <div>
          <slot></slot>
        </div>
      </div>

      <div>
        <slot name="footer"></slot>
      </div>
    </div>
  </a>
</template>

<script>
import Thumbnail from "~/Thumbnail";

export default {
  components: {
    Thumbnail,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    snippet: {
      type: String,
      required: false,
    },
    image: String,
    author: {
      type: Object,
      required: false,
    },
    href: {
      type: String,
      required: false,
    },
  },
};
</script>