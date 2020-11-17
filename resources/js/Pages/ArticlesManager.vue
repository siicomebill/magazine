<template>
  <ManagerPage :items="items" :newPage="this.newItem  || $route('articles.write')">
    <div class="sm:grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
      <Card v-bind="article" v-for="article in list" :key="article.id" class="mt-auto">
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="article.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
                >Edit</a
              >
              <a
                :href="article.links.delete"
                class="mx-1 hover:shadow-xl bg-red-600 text-white px-4 py-2 rounded-lg transition-shadow duration-200"
                >Delete</a
              >
            </div>
          </div>
        </template>
      </Card>
    </div>
  </ManagerPage>
</template>

<script>
import ManagerPage from "~/Base/ManagerPage";
import Layout from "@/Layouts/AppLayout";
import Card from "~/Card";

export default {
  layout: Layout,
  extends: ManagerPage,
  components: {
    ManagerPage,
    Card,
  },
  props: {
    items: Object,
    newItem: String,
  },
};
</script>