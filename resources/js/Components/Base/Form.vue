<script>
export default {
  methods: {
    async publish() {
      await this.$inertia.post(this.publishTo, this.edited)
    },
  },
  props: {
    publishTo: String,
    stored: {
      type: [Object, Array],
      required: false
    },
  },
  data() {
    return {
      edited: {},
    }
  },
  mounted(){
    this.edited =  this.stored ?? this.edited
  }
}
</script>