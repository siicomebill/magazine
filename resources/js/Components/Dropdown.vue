<template>
	<div class="flex relative" v-click-outside="onClickOutside" @mouseover="hovering = true" @mouseleave="hovering = false">
		<div :class="{ 'lg:hidden': mobileOnly }">
			<div class="-mr-2 flex items-center">
				<span
					@click="showDropdown = !showDropdown"
					class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 focus:outline-none ml-auto cursor-pointer"
				>
					<span v-if="title" class="mr-2">{{ title }}</span>
					<img src="/img/arrow-down.svg" alt class="h-4 w-4 arrow" :class="{ flipped: open }" />
				</span>
			</div>
		</div>

		<div
			:class="{
				hidden: !open,
				'lg:relative lg:flex lg:border-none lg:shadow-none': mobileOnly,
			}"
			class="menu order-first flex flex-col absolute right-0 top-full bg-white z-40 lg:items-center align-items-center p-3 rounded-lg shadow-lg border border-1"
		>
			<slot></slot>
		</div>
	</div>
</template>

<script>
import vClickOutside from "v-click-outside";

export default {
	props: {
		title: String,
		mobileOnly: {
			type: Boolean,
			default: false,
		},
	},
	data() {
		return {
			showDropdown: false,
			hovering: false,
		};
	},
	directives: {
		clickOutside: vClickOutside.directive,
	},
	methods: {
		onClickOutside(event) {
			this.showDropdown = false;
		},
	},
	computed: {
		open() {
			return this.showDropdown ? true : (this.hovering);
		},
	},
};
</script>

<style scoped>
.menu {
	min-width: 200px;
}

.arrow {
	filter: invert(50%);
}

.flipped {
	transform: rotateX(180deg);
}
</style>