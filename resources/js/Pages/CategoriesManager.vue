<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="$route('categories.write')"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-lg transition-shadow duration-200"
        >Nuovo</a
      >

      <Card
        v-for="category in items"
        :key="category.id"
        :title="category.name"
        :snippet="category.snippet"
        :image="category.image"
      >
        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="category.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="category.links.delete"
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
    items: Array,
  },
};
</script>