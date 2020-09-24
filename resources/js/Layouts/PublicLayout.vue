<template>
  <div>
    <nav class="sticky top-0 bg-white shadow-lg flex items-center justify-between flex-wrap p-6">
      <div class="flex items-center flex-shrink-0 mr-6">
        <a href="/" class="font-semibold text-xl tracking-tight">BILL</a>
      </div>
      <div class="block lg:hidden">
        <div class="-mr-2 flex items-center">
          <button
            @click="showDropdown = ! showDropdown"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
          >
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path
                :class="{'hidden': showDropdown, 'inline-flex': ! showDropdown }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                :class="{'hidden': ! showDropdown, 'inline-flex': showDropdown }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
      </div>

      <div  :class="{'block': showDropdown, 'hidden': ! showDropdown}" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
          <a :href="$route('categories')" class="block mt-4 lg:inline-block lg:mt-0 mr-4">Categorie</a>
        </div>

        <div v-if="$page.auth">
          <a
            :href="$route('dashboard')"
            class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent mt-4 lg:mt-0"
          >Dashboard</a>
        </div>

        <div v-else>
          <a
            :href="$route('login')"
            class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent mt-4 lg:mt-0"
          >Login</a>
          <a
            :href="$route('register')"
            class="inline-block text-sm px-4 py-2 leading-none mt-4 lg:mt-0"
          >Registrati</a>
        </div>
      </div>
    </nav>

    <main>
      <slot></slot>
    </main>

    <section class="py-6 bg-gray-200 text-gray-700">
      <div class="container mx-auto">
        <p>Sii Come Bill Magazine · Questa è solo una prova... infatti la grafica è da rivedere</p>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showDropdown: false,
    };
  },
};
</script>