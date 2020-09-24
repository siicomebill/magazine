<template>
  <div class="relative inline-block">
    <div class="block w-full lg:hidden">
      <div class="-mr-2 flex items-center">
        <button
          @click="showDropdown = !showDropdown"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
        >
          <svg
            class="h-6 w-6"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              :class="{ hidden: showDropdown, 'inline-flex': !showDropdown }"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path
              :class="{ hidden: !showDropdown, 'inline-flex': showDropdown }"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>
    </div>

    <div
      :class="{ hidden: !showDropdown }"
      class="lg:relative absolute right-0 bg-white z-40 flex-grow lg:flex lg:items-center lg:w-auto p-3 rounded-lg shadow-lg border border-1 lg:shadow-none lg:border-none"
    >
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    containerClass: String,
  },
  data() {
    return {
      showDropdown: false,
    };
  },
};
</script>