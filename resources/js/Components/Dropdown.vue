<template>
	<div class="flex relative" v-click-outside="onClickOutside" @mouseover="hovering = true" @mouseleave="hovering = false">
		<div :class="{ 'lg:hidden': mobileOnly }">
			<div>
				<span
					@click="showDropdown = !showDropdown"
					class="flex items-center focus:outline-none cursor-pointer"
				>
					<span v-if="title" class="block col-span-3">{{ title }}</span>
					<span class="block pl-2">
						<img src="/img/arrow-down.svg" alt class="h-4 w-4 arrow" :class="{ flipped: open }" />
					</span>
				</span>
			</div>
		</div>

		<div
			:class="[
				!open ? 'hidden' : '',
				mobileOnly ? 'lg:relative lg:flex lg:border-none lg:shadow-none' : '',
				containerClass,
			]"
			class="menu order-first flex flex-col absolute right-0 top-full z-40 align-items-center"
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
		containerClass: {
			type: String,
			default: "bg-white p-3 text-black rounded-lg shadow-lg border border-1"
		}
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
			return this.showDropdown;
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