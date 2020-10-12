<template>
  <div>
    <nav
      class="top-0 left-0 right-0 z-30 lg:bg-white lg:text-black bg-black text-white shadow-lg lg:px-6 lg:py-1 px-4" :class="mode"
    >
      <div class="container mx-auto flex items-center justify-between flex-wrap">
        <div class="flex items-center flex-shrink-0 mr-6">
          <a href="/" class="font-semibold text-xl tracking-tight font-banner uppercase">{{$page.app.name}}</a>
        </div>

        <Dropdown class="text-black" title="Esplora">
          <div class="text-sm lg:mb-0 mb-4">
            <slot name="menu">
              <a
                :href="$route('categories')"
                class="block lg:inline-block lg:mt-0 mx-4"
              >
                Categorie
              </a>
            </slot>
          </div>

          <div v-if="$page.auth">
            <a
              :href="$route('dashboard')"
              class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent lg:mt-0"
              >Dashboard</a
            >
          </div>

          <div v-else>
            <a
              :href="$route('login')"
              class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent lg:mt-0"
              >Login</a
            >
            <a
              :href="$route('register')"
              class="inline-block text-sm px-4 py-2 leading-none lg:mt-0"
              >Registrati</a
            >
          </div>
        </Dropdown>
      </div>
    </nav>

    <main>
      <slot></slot>
    </main>

    <section class="py-6 bg-gray-200 text-gray-700">
      <div class="container mx-auto px-4 md:px-0">
        <div class="py-5 mx-auto text-center">
          <a href="https://www.instagram.com/siicomebill/" target="_blank" rel="noopener" class="cta-royal mx-5">Instagram</a>
          <a href="https://www.facebook.com/siicomebill/" target="_blank" rel="noopener" class="cta-blue mx-5">Facebook</a>
        </div>

        <p class="py-10 text-center">
          {{$page.app.name}} · DEMO · Complete version coming soon!
        </p>
      </div>
    </section>
  </div>
</template>

<script>
import Dropdown from "~/Dropdown";

export default {
  components: {
    Dropdown,
  },
  props: {
    mode: {
      type: String,
      default: "sticky",
    },
  }
};
</script>