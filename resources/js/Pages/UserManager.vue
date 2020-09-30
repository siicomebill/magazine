<template>
  <div>
    <div class="container mx-auto my-5">
      <Card
        v-for="user in items"
        :key="user.id"
        :title="user.name"
      >
        <p>{{user.email}}</p>

        <template #footer>
          <div>
            <div class="justify-end flex">
              <a
                :href="user.links.edit"
                class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
              >Edit</a>
              <a
                :href="user.links.delete"
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