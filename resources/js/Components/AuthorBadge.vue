<template>
  <div class="my-4 rounded-lg flex flex-col md:flex-row items-center">
    <div
      v-if="profile_photo_url"
      class="inline-block border-4 border-white p-0 rounded-full m-3"
    >
      <img
        :src="profile_photo_url"
        alt="(Avatar)"
        class="h-16 w-16 rounded-full"
      />
    </div>

    <div class="lg:text-xl text-lg text-center">
      <p class="leading-none font-bold">{{ name }}</p>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        profile_photo_url: String,
        name: String,
    },
};
</script>