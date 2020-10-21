<template>
  <ManagerPage :items="items">
    <Card v-for="page in list" :key="page.id" :title="page.name">
      <template #footer>
        <div>
          <div class="justify-end flex">
            <a
              :href="page.links.edit"
              class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a
            >
            <a
              :href="page.links.delete"
              class="mx-1 hover:shadow-xl bg-red-600 text-white px-4 py-2 rounded-lg transition-shadow duration-200"
              >Delete</a
            >
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