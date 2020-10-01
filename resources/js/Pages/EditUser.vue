<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <p>List editor</p>
    </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import Form from "~/Base/Form";

export default {
  layout: Layout,
  extends: Form,
  props: {
    roles: Array,
  },
  data() {
    return {
      edited: {
        roles: [],
      },
    };
  },
};
</script>