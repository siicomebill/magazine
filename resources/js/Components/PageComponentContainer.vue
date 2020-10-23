<template>
	<div>
		<code>{{this.name}} · {{this.propertyName}}</code>
        <component :is="component" />
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
        }
    }
};
</script>