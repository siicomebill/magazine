<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="$route('sponsors.write')"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-lg transition-shadow duration-200"
        >Nuovo</a
      >

      <Card
        v-for="sponsor in items"
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