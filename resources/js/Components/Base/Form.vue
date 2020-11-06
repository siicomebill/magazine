<script>
export default {
  methods: {
    prepareData(edited){
      return edited
    },
    async publish() {
      let data = this.prepareData(this.edited)
      await this.$inertia.post(this.publishTo, data)
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