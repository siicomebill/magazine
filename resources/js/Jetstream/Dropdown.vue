<template>
	<div class="relative" v-click-outside="hide">
		<div @click="toggle">
			<slot name="trigger"></slot>
		</div>

		<!-- Full Screen Dropdown Overlay -->
		<div v-show="open" class="fixed inset-0 z-40" @click="hide"></div>

		<transition
			enter-active-class="transition ease-out duration-200"
			enter-class="transform opacity-0 scale-95"
			enter-to-class="transform opacity-100 scale-100"
			leave-active-class="transition ease-in duration-75"
			leave-class="transform opacity-100 scale-100"
			leave-to-class="transform opacity-0 scale-95"
		>
			<div
				v-show="open"
				class="absolute z-50 mt-2 rounded-md shadow-lg"
				:class="[widthClass, alignmentClasses]"
				style="display: none"
				@click="hide"
			>
				<div class="rounded-md shadow-xs" :class="contentClasses">
					<slot name="content"></slot>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>
import ClickOutside from "vue-click-outside";

export default {
	props: {
		align: {
			default: "right",
		},
		width: {
			default: "48",
		},
		contentClasses: {
			default: () => ["py-1", "bg-white"],
		},
	},

	data() {
		return {
			open: false,
		};
	},

	created() {
		const closeOnEscape = (e) => {
			if (this.open && e.keyCode === 27) {
				this.open = false;
			}
		};

		this.$once("hook:destroyed", () => {
			document.removeEventListener("keydown", closeOnEscape);
		});

		document.addEventListener("keydown", closeOnEscape);
	},

	computed: {
		widthClass() {
			return {
				48: "w-48",
			}[this.width.toString()];
		},

		alignmentClasses() {
			if (this.align == "left") {
				return "origin-top-left left-0";
			} else if (this.align == "right") {
				return "origin-top-right right-0";
			} else {
				return "origin-top";
			}
		},
	},

	methods: {
		hide() {
			this.open = false;
		},
		toggle() {
			this.open = !this.open;
		},
	},

	directives: {
		ClickOutside,
	},
};
</script>
