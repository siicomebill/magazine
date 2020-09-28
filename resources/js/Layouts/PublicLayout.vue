<template>
  <div>
    <nav
      class="sticky top-0 z-30 lg:bg-white lg:text-black bg-black text-white shadow-lg lg:px-6 lg:py-1 px-4"
    >
      <div class="container mx-auto flex items-center justify-between flex flex-wrap">
        <div class="flex items-center flex-shrink-0 mr-6">
          <a href="/" class="font-semibold text-xl tracking-tight">BILL</a>
        </div>

        <Dropdown class="text-black flex-grow">
          <div class="text-sm lg:flex-grow lg:mb-0 mb-4">
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
        <p>
          Sii Come Bill Magazine · Questa è solo una prova... infatti la grafica
          è da rivedere
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
};
</script>