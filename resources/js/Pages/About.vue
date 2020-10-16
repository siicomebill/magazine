<template>
  <div>
      <div class="bg-black text-white xl:py-64 py-20">
          <div class="container mx-auto">
              <div>
                  <h1 class="my-auto font-banner capitalize text-6xl">{{page.name}}</h1>
              </div>
          </div>
      </div>

      <div class="container mx-auto my-6">
          <Reader v-model="page.content" class="article content"/>
      </div>
  </div>
</template>

<script>
import Layout from "@/Layouts/PublicLayout"
import { Reader } from "vue-publisher"

export default {
    layout: Layout,
    props: {
        content: {}
    },
    components: {
        Reader,
    },
    computed: {
        page(){
            return {
                name: "about",
                content: this.content.about.content,
                details: this.content.about.details,
            }
        },
    }
}
</script>