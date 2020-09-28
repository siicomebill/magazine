<template>
  <a
    class="block bg-white rounded-lg my-4 lg:flex"
    :href="href"
  >
    <Thumbnail
      :src="image"
      :alt="title"
      square
      class="lg:w-1/2 rounded-lg text-center overflow-hidden"
    />
    <div class="flex flex-col p-4 lg:w-1/2 justify-between leading-normal">
      <div class="mb-8">
        <p class="font-bold text-2xl text-primary mb-2 break-words">{{ title }}</p>
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