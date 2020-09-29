<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="$route('config.write')"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-lg transition-shadow duration-200"
        >Nuovo</a
      >

      <Card
        v-for="config in items"
        :key="config.id"
        :title="config.name"
      >
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="config.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="config.links.delete"
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