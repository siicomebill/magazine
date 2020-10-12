<template>
	<div class="flex relative">
		<div :class="{'lg:hidden': mobileOnly}">
			<div class="-mr-2 flex items-center">
				<button
					@click="showDropdown = !showDropdown"
					class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 focus:outline-none ml-auto"
				>
					<span v-if="title" class="mr-2">{{title}}</span>
					<svg
						class="h-6 w-6"
						stroke="currentColor"
						fill="none"
						viewBox="0 0 24 24"
					>
						<path
							:class="{ hidden: showDropdown, 'inline-flex': !showDropdown }"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M4 6h16M4 12h16M4 18h16"
						/>
						<path
							:class="{ hidden: !showDropdown, 'inline-flex': showDropdown }"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M6 18L18 6M6 6l12 12"
						/>
					</svg>
				</button>
			</div>
		</div>

		<div
			:class="{ hidden: !showDropdown, 'lg:relative lg:block': mobileOnly }"
			class="menu order-first block absolute right-0 top-full bg-white z-40 lg:items-center p-3 rounded-lg shadow-lg border border-1"
		>
			<slot></slot>
		</div>
	</div>
</template>

<script>
import ClickOutside from "vue-click-outside";

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
		};
	},
	directives: {
		ClickOutside
	},
};
</script>

<style scoped>
.menu {
	min-width: 200px;
}
</style>