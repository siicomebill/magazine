<template>
  <a
    class="block w-full bg-white rounded-lg my-4 shadow-xl flex"
    :href="href"
  >
    <Thumbnail
      :src="image"
      :alt="title"
      aspectRatio="square"
      class="block w-1/4 rounded-lg text-center overflow-hidden"
    />
    <div class="flex flex-col p-4 w-50 justify-between leading-normal">
      <div class="mb-8">
        <p class="font-bold text-2xl text-primary mb-2">{{ title }}</p>
        <div class="my-3">
          <div class="text-sm" v-if="author">
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
import Card from '~/Card';

export default {
    extends: Card
}
</script>