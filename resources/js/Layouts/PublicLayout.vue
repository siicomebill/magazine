<template>
  <div>
    <nav class="flex items-center justify-between flex-wrap p-6">
      <div class="flex items-center flex-shrink-0 mr-6">
        <span class="font-semibold text-xl tracking-tight">BILL</span>
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
            href="#responsive-header"
            class="block mt-4 lg:inline-block lg:mt-0 mr-4"
          >Categoria 1</a>
          <a
            href="#responsive-header"
            class="block mt-4 lg:inline-block lg:mt-0 mr-4"
          >Categoria 2</a>
          <a
            href="#responsive-header"
            class="block mt-4 lg:inline-block lg:mt-0"
          >Categoria 3</a>
        </div>
        <div>
          <a
            href="#"
            class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent mt-4 lg:mt-0"
          >Login</a>
          <a
            href="#"
            class="inline-block text-sm px-4 py-2 leading-none mt-4 lg:mt-0"
          >Registrati</a>
        </div>
      </div>
    </nav>

    <main>
      <slot></slot>
    </main>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>