<template>
	<div class="flex relative" v-click-outside="onClickOutside">
		<div :class="{'lg:hidden': mobileOnly}">
			<div class="-mr-2 flex items-center">
				<span
					@click="showDropdown = !showDropdown"
					class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 focus:outline-none ml-auto cursor-pointer"
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
				</span>
			</div>
		</div>

		<div
			:class="{ hidden: !showDropdown, 'lg:relative lg:block lg:border-none lg:shadow-none': mobileOnly }"
			class="menu order-first block absolute right-0 top-full bg-white z-40 lg:items-center p-3 rounded-lg shadow-lg border border-1"
		>
			<slot></slot>
		</div>
	</div>
</template>

<script>
import vClickOutside from 'v-click-outside'

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
      clickOutside: vClickOutside.directive
	},
	methods: {
      onClickOutside (event) {
        this.showDropdown = false
      }
    }
};
</script>

<style scoped>
.menu {
	min-width: 200px;
}
</style>