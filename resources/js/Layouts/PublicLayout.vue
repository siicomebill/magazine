<template>
  <div>
    <nav class="flex items-center justify-between flex-wrap p-6">
      <div class="flex items-center flex-shrink-0 mr-6">
        <a href="/" class="font-semibold text-xl tracking-tight">BILL</a>
      </div>
      <div class="block lg:hidden">
        <button
          class="flex items-center px-3 py-2 border rounded border-teal-400 hover:border-white"
        >
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
          <a
            :href="$route('categories')"
            class="block mt-4 lg:inline-block lg:mt-0 mr-4"
          >Categorie</a>
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