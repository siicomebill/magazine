<template>
  <div>
    <div class="class container mx-auto my-4 rounded-lg p-4">
      <form @submit.prevent="publish">
        <div class="mb-4">
          <input
            type="text"
            v-model="edited.roles"
            placeholder="roles"
            class="appearance-none bg-white shadow w-full leading-tight p-4 rounded-lg text-3xl font-bold text-gray-700"
            :class="{ 'border border-red-500': error('roles') }"
          />
          <span class="text-red-500 text-sm italic" v-if="error('roles')">{{error('roles')}}</span>
        </div>

        <button
          type="submit"
          class="text-lg bg-blue-500 text-white font-bold rounded-lg mt-4 w-full p-4"
        >Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from '@/Layouts/AppLayout'
import Form from '~/Base/Form'

export default {
  layout: Layout,
  extends: Form,
  props: {
    roles: Array,
  },
  data() {
    return {
      edited: {
        roles: []
      },
    }
  }
}
</script>