<template>
	<div>
		<code>{{this.name}} · {{this.propertyName}}</code>
        <component :is="component" :content="content"/>
	</div>
</template>

<script>
export default {
	props: {
		name: String,
        propertyName: String,
        data: Object
    },
    computed: {
        component(){
            return () => import('#/' + this.name + '.vue')
        },
        content(){
            return this.data ? (this.data[this.propertyName] || null) : null
        }
    }
};
</script>