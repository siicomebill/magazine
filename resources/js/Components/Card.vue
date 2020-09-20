<template>
  <div class="w-full lg:flex bg-white rounded-lg my-4 shadow-xl">
    <div v-if="image" class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" :style="{ 'background-image': 'url(' + image + ')' }" title="Thumbnail"></div>
    <div class="flex flex-col p-4 w-full justify-between leading-normal">
      <div class="mb-8">
        <p class="font-bold text-2xl text-primary mb-2">{{title}}</p>
        <p class="text-gray-700 text-base">{{snippet}}</p>
        <div class="my-3">
          <img
            class="w-10 h-10 rounded-full mr-4"
            v-if="author.profile_photo_path"
            :alt="author.name[0]"
            :src="author.profile_photo_path"
          />
          <div class="text-sm">
            <p class="text-gray-500 leading-none">{{author.name}}</p>
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
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    snippet: {
      type: String,
      required: true,
    },
    image: String,
    author: {
      type: Object,
      required: true,
    },
  },
};
</script>