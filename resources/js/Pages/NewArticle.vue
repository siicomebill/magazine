<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg bg-white shadow-xl p-4">
      <form @submit.prevent="publish">
        <input v-model="title" />
        <Publisher class="publisher" v-model="content" />
      </form>
    </div>
  </div>
</template>

<script>
import { Publisher } from "vue-publisher";

export default {
  components: {
    Publisher,
  },
  methods: {
    publish() {
      alert("sup");
    },
  },
  data() {
    return {
      title: "",
      content: {},
    };
  },
};
</script>