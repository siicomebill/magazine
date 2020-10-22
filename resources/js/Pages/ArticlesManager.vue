<template>
  <ManagerPage :items="items" :newPage="$route('articles.write')">
      <Card v-bind="article" v-for="article in list" :key="article.id">
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
  </ManagerPage>
</template>

<script>
import ManagerPage from "~/Base/ManagerPage";
import Layout from "@/Layouts/AppLayout";

export default {
  layout: Layout,
  extends: ManagerPage,
  components: {
    ManagerPage,
  },
  props: {
    items: Object,
  },
};
</script>