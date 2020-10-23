<template>
  <div>
    <div class="container mx-auto my-5">
      <a
        :href="newPage"
        class="w-full block hover:shadow-xl bg-white border-gray-200 text-center px-6 py-3 rounded-full transition-shadow duration-200"
        >Nuovo</a
      >

      <slot>
        <Card v-for="item in list" :key="item.id" v-bind="item">
          <template #footer>
            <div>
              <div class="justify-end flex">
                <a
                  :href="item.links.edit"
                  class="mx-1 hover:shadow-xl bg-gray-100 px-4 py-2 rounded-lg transition-shadow duration-200"
                  >Edit</a
                >
                <a
                  :href="item.links.delete"
                  class="mx-1 hover:shadow-xl bg-red-600 text-white px-4 py-2 rounded-lg transition-shadow duration-200"
                  >Delete</a
                >
              </div>
            </div>
          </template>
        </Card>
      </slot>

      <div class="w-full text-center grid grid-cols-2 gap-4">
        <a
          :href="previousPage"
          class="block bg-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-200"
          >Prev</a
        >
        <a
          :href="nextPage"
          class="block bg-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-200"
          >Next</a
        >
      </div>
    </div>
  </div>
</template>

<script>
import Card from "~/MiniCard";

export default {
  components: {
    Card,
  },
  props: {
    items: Object,
    newPage: String,
  },
  computed: {
    list() {
      return this.items.data;
    },
    nextPage() {
      return this.items.links.next;
    },
    previousPage() {
      return this.items.links.prev;
    },
  },
};
</script>