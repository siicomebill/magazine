<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="$route('pages.write')"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-lg transition-shadow duration-200"
        >Nuovo</a
      >

      <Card
        v-for="page in items"
        :key="page.id"
        :title="page.name"
      >
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="page.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="page.links.delete"
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
import Card from "~/MiniCard";
import Layout from "@/Layouts/AppLayout";

export default {
  layout: Layout,
  components: {
    Card,
  },
  props: {
    items: Array,
  },
};
</script>