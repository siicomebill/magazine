<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <json-editor
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
      </json-editor>
    </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from "~/Base/Form";
import JsonEditor from "vue-json-ui-editor";

const SCHEMA = {
  type: "object",
  title: "User",
  properties: {
    roles: {
      type: "array",
      title: "Roles",
      items: {
        uniqueItems: true,
        type: "object",
        anyOf: [
          { value: "daily", label: "Daily New" },
          { value: "promotion", label: "Promotion" },
        ],
      },
    },
  },
};

export default {
  layout: Layout,
  extends: Form,
  components: {
    JsonEditor,
  },
  props: {
    roles: Array,
  },
  data() {
    return {
      edited: {
        roles: [],
      },
      schema: SCHEMA,
    };
  },
};
</script>