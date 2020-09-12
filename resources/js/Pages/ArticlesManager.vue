<template>
  <div>
    <div class="container mx-auto">
      <Card v-bind="article" v-for="article in articles" :key="article.id">
        <template #footer>
          <div>
            <div class="justify-end flex">
              <button class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200">Edit</button>
              <button class="mx-1 hover:shadow-xl bg-red-600 text-white px-4 py-2 rounded-lg transition-shadow duration-200">Delete</button>
            </div>
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>

<script>
import Card from "~/Card";

export default {
  components: {
    Card,
  },
  props: {
    articles: Array,
  },
};
</script>