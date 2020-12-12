export default {
    props: {
        slug: String,
    },
    computed: {
        identifier(){
            return this.slug ?? this.id
        },
    },
}