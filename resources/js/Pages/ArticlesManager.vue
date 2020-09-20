<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="$route('articles.write')"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-lg transition-shadow duration-200"
      >Nuovo</a>

      <Card v-bind="article" v-for="article in articles" :key="article.id">
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="article.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="article.links.delete"
                class="mx-1 hover:shadow-xl bg-red-600 text-white px-4 py-2 rounded-lg transition-shadow duration-200"
              >Delete</a>
            </div>
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>

<script>
import Card from "~/Card";
import Layout from "@/Layouts/AppLayout";

export default {
  layout: Layout,
  components: {
    Card,
  },
  props: {
    articles: Array,
  },
};
</script>