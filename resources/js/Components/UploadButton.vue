<template>
	<label
		class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-900 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-gray-900 hover:text-white"
	>
		<Icon icon="cloud-upload-alt" size="2x"/>
		<span class="mt-2 text-base leading-normal">{{title}}</span>
		<span
			v-if="img"
			class="mt-2 text-gray-500 text-sm uppercase italic leading-normal"
			>{{ img }}</span
		>
		<input
			type="file"
			@change="$emit('change', $event)"
			placeholder="Thumbnail"
			class="hidden"
		/>
	</label>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Upload",
        },
        img: String,
    },
}
</script>