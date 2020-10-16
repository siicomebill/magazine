<template>
  <p>About page</p>
</template>

<script>
export default {
    props: {
        content: {}
    },
    computed: {
        page(){
            return this.content.about
        }
    }
}
</script>