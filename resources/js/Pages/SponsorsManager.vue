<template>
  <ManagerPage :items="items" :newPage="$route('sponsors.write')">

      <Card
        v-for="sponsor in list"
        :key="sponsor.id"
        :title="sponsor.name"
        :snippet="sponsor.snippet"
        :image="sponsor.image"
      >
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="sponsor.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="sponsor.links.delete"
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