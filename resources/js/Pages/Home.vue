<template>
  <div>
    <div
      class="py-20 bg-black banner text-white text-center -mb-20 pb-40 lg:rounded-br-full md:px-10 lg:px-0"
    >
      <div class="container mx-auto px-4 md:px-0">
        <h1 class="md:text-6xl text-4xl font-bold">Sii Come Bill</h1>
        <h2>Il Magazine Intelligente</h2>
      </div>
    </div>
    <div class="lg:grid grid-cols-2 gap-16 px-16">
      <div
        v-for="category in categories"
        :key="category.id"
      >
        <div class="bg-white rounded-lg shadow-lg p-6 my-5">
          <p class="text-6xl font-bold">{{ category.name }}</p>
          <div>
            <div class="block lg:grid grid-cols-2 grid-flow-cols gap-4">
              <div>
                <Card
                  v-bind="category.articles[0]"
                  :href="$route('articles.read', category.articles[0].id)"
                />
              </div>

              <div>
                <MiniCard
                  v-bind="article"
                  v-for="article in category.articles.slice(1, 4)"
                  :key="article.id"
                  :href="$route('articles.read', article.id)"
                />
              </div>
            </div>

            <div>
              <MiniCard
                v-bind="article"
                v-for="article in category.articles.slice(5, 7)"
                :key="article.id"
                :href="$route('articles.read', article.id)"
              />
            </div>
          </div>

          <a
            class="block w-full border border-1 border-black rounded-full p-3 text-center bg-white"
            :href="$route('categories.articles', category.id)"
            >Vedi tutti</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Card from "~/Card";
import MiniCard from "~/MiniCard";
import Layout from "@/Layouts/PublicLayout";

export default {
  layout: Layout,
  components: {
    Card,
    MiniCard,
  },
  props: {
    sponsors: Array,
    categories: Array,
  },
};
</script>

<style scoped>
/*TODO Separate into dedicated class with theme colors */
.banner {
  background-color: #000000;
  background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.16'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>