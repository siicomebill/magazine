<template>
  <div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div class="my-8 text-2xl text-gray-900">
        <p>Welcome, {{$page.user.name}}.</p>
      </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
      <div class="p-6">
        <div class="flex items-center">
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-8 h-8 text-gray-400"
          >
            <path
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
            />
          </svg>
          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a :href="$route('articles.list.mine')">I tuoi articoli</a>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">Visualizza e gestisci il tuo catalogo di articoli.</div>

          <a :href="$route('articles.list.mine')">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
              <div>Vai</div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="p-6" v-if="userIsAdmin">
        <div class="flex items-center">
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-8 h-8 text-gray-400"
          >
            <path
              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
            />
            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a :href="$route('sponsors.list')">Sponsors</a>
          </div>
        </div>

        <div class="ml-12">
          <div
            class="mt-2 text-sm text-gray-500"
          >Stringi collaborazioni con degli sponsor e fai apparire il loro brand in mezzo agli articoli.</div>

          <a :href="$route('sponsors.list')">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
              <div>Sponsorizza</div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="p-6" v-if="userIsAdmin">
        <div class="flex items-center">
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-8 h-8 text-gray-400"
          >
            <path
              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
            />
            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a :href="$route('categories.list')">Categorie</a>
          </div>
        </div>

        <div class="ml-12">
          <div
            class="mt-2 text-sm text-gray-500"
          >Organizza i tuoi articoli in categorie distinte.</div>

          <a :href="$route('categories.list')">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
              <div>Gestisci</div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    userIsAdmin(){
      return this.$page.user.roles.some(role => role.name == "admin")
    }
  }
}
</script>
