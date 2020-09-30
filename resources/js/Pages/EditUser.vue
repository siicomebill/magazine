<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <!-- <json-editor
        @submit.prevent="publish"
        no-validate
        :schema="schema"
        v-model="edited"
        input-wrapping-class="appearance-none bg-white shadow my-4 leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
      >
        <button
          type="submit"
          class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4"
        >
          Save
        </button>
      </json-editor> -->

      <tree :data="treeData" />
    </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from "~/Base/Form";
import LiquorTree from "liquor-tree";

export default {
  layout: Layout,
  extends: Form,
  components: {
    [LiquorTree.name]: LiquorTree,
  },
  props: {
    roles: Array,
  },
  data() {
    return {
      treeData: [
        { text: "Item 1" },
        { text: "Item 2" },
        { text: "Item 3", state: { selected: true, editable: true } },
        { text: "Item 4" },
      ],
      edited: {
        roles: [],
      },
    };
  },
};
</script>