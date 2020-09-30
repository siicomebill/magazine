<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <json-editor ref="JsonEditor" :schema="schema" v-model="model" input-wrapping-class="appearance-none bg-white shadow my-4 leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700">
        <button @click="publish" class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4">Save</button>
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
  title: "vue-json-editor demo",
  properties: {
    name: {
      type: "string",
    },
    email: {
      type: "string",
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
      model: {
        name: "Yourtion",
      },
      edited: {
        roles: [],
      },
      schema: SCHEMA,
      //   schema: {
      //     type: "array",
      //     title: "User roles",
      //     items: {
      //       type: "object",
      //       properties: {
      //         name: {
      //           title: "Name",
      //           type: "string",
      //         },
      //       },
      //     },
      //   },
    };
  },
};
</script>