<template>
  <Layout mode="fixed">
    <template #menu>
      <ul
        v-scroll-spy-active="{ class: 'font-bold' }"
        v-scroll-spy-link
        v-if="categories.length"
        class="lg:flex"
      >
        <li v-for="category in categories" :key="category.id" class="lg:mx-3">
          <a class="cursor-pointer">{{ category.name }}</a>
        </li>
      </ul>
    </template>
    <div class="content-background">
      <div
        class="flex py-20 bg-black banner select-none min-h-screen md:min-h-0 text-white text-center md:-mb-20 md:pb-40 lg:rounded-br-full md:px-10 lg:px-0"
      >
        <div class="container m-auto px-4 md:px-0">
          <div class="font-banner mb-auto" v-if="$page.configuration.banner">
            <img
              src="/img/logo_small.png"
              class="logo-invert block mx-auto"
              alt
            />
            <Reader v-model="$page.configuration.banner" />
          </div>
        </div>
      </div>

      <div class="md:hidden sticky bottom-0 px-6 py-4">
        <p class="cta">
          Scorri verso l'alto per le notizie
        </p>
      </div>

      <div class="container mx-auto">
        <div class="col-span-5 z-10" v-scroll-spy>
          <div v-for="(category, i) in categories" :key="category.id">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-5">
              <a
                :href="$route('categories.articles', category.id)"
                class="block text-3xl font-banner text-center lg:text-left lg:text-6xl capitalize"
              >
                {{ category.name }}
              </a>
              <div>
                <div class="block lg:grid grid-cols-2 grid-flow-cols gap-4">
                  <div class="col-span-1">
                    <Card
                      v-bind="category.articles[0]"
                      :href="$route('articles.read', category.articles[0].id)"
                    />
                  </div>

                  <div class="col-span-1">
                    <MiniCard
                      v-bind="article"
                      v-for="article in category.articles.slice(1, 4)"
                      :key="article.id"
                      :href="$route('articles.read', article.id)"
                      class="h-auto bg-transparent"
                    />
                  </div>
                </div>

                <div class="lg:grid grid-cols-2 gap-2">
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
              >
                Vedi tutti
              </a>
            </div>

            <MiniSponsorCard
              v-if="sponsors[i]"
              v-bind="sponsors[i]"
              class="lg:w-11/12"
            />
          </div>
        </div>
      </div>

      <div class="container mx-auto" v-if="articles.length">
        <p class="text-center text-4xl text-gray-500 my-4">Esplora</p>
        <MiniCard
          v-bind="article"
          v-for="article in articles"
          :key="article.id"
          :href="$route('articles.read', article.id)"
        />
      </div>
    </div>
  </Layout>
</template>

<script>
import Card from "~/Card";
import MiniCard from "~/MiniCard";
import SponsorCard from "~/SponsorCard";
import MiniSponsorCard from "~/MiniSponsorCard";
import Layout from "@/Layouts/PublicLayout";
import { Reader } from "vue-publisher";

export default {
  components: {
    Layout,
    Card,
    MiniCard,
    SponsorCard,
    MiniSponsorCard,
    Reader,
  },
  props: {
    sponsors: Array,
    categories: Array,
    articles: Array,
    configuration: [Object, Array],
  },
};
</script>

<style scoped>
/*TODO Separate into dedicated class with theme colors */
.banner {
  background-color: #000000;
  background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.16'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.content-background {
  background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.02'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E") !important;
}
</style>