<template>
	<div>
		<div :class="mode" class="top-0 left-0 right-0 z-30">
			<nav class="bg-white text-dark shadow-lg lg:px-6 lg:py-1 px-4 py-2">
				<div
					class="container mx-auto flex items-center justify-between flex-wrap"
				>
					<div class="flex items-center flex-shrink-0 mr-6">
						<a
							href="/"
							class="font-semibold text-xl tracking-tight font-banner uppercase"
							>{{ $page.app.name }}</a
						>
					</div>

					<div class="lg:inline-block lg:order-last flex items-end">
						<div v-if="$page.auth">
							<UserDropdown />
						</div>

						<Dropdown
							v-else
							mobileOnly
							title="Account"
							class="font-banner uppercase"
						>
							<div class="lg:grid grid-cols-2 gap-2">
								<a
									:href="$route('login')"
									class="block text-sm text-center px-4 py-2 leading-none border rounded-full bg-primary border-none text-black lg:mt-0"
									>Login</a
								>
								<a
									:href="$route('register')"
									class="block text-sm text-center text-black px-4 py-2 leading-none lg:mt-0"
									>Registrati</a
								>
							</div>
						</Dropdown>
					</div>
				</div>
			</nav>

			<nav
				class="bg-dark text-white shadow-lg lg:px-6 lg:py-1 px-4 py-3 font-banner flex justify-end items-end"
			>
				<Dropdown
					title="Sezioni"
					mobileOnly
					class="uppercase"
					containerClass="rounded-lg py-2 px-4 bg-dark text-white"
				>
					<div class="text-sm lg:mb-0 mb-4 lg:inline-block">
						<slot name="menu">
							<ul v-if="$page.navbar.categories" class="lg:flex">
								<li
									v-for="category in $page.navbar.categories"
									:key="category.id"
									class="lg:mx-3 h-10 flex"
								>
									<a
										class="flex flex-grow cursor-pointer my-auto"
										:href="$route('categories.articles', category.id)"
									>
										<span
											class="cursor-pointer block my-auto font-bold uppercase"
											>{{ category.name }}</span
										>
									</a>
									<div class="flex">
										<Dropdown
											class="text-black flex-grow my-auto capitalize"
											containerClass="text-right bg-white rounded-lg py-3 px-4 text-dark"
											v-if="category.children.length"
										>
											<a
												class="text-sm block lg:flex-grow pb-3"
												v-for="child in category.children"
												:key="child.id"
												:href="$route('categories.articles', child.id)"
												>{{ child.name }}</a
											>
										</Dropdown>
									</div>
								</li>
							</ul>
						</slot>
					</div>
				</Dropdown>
			</nav>
		</div>

		<main class="banner bg-dark lg:bg-fixed">
			<slot></slot>
		</main>

		<section class="footer py-10 px-4 bg-dark text-white">
			<div class="mx-auto text-center">
				<div v-if="$page.configuration.footer">
					<Reader v-model="$page.configuration.footer" />
				</div>
			</div>

			<div
				class="container mx-auto px-4 lg:grid grid-cols-6 gap-4 items-center"
			>
				<Thumbnail
					v-if="$page.configuration.logo"
					:src="$page.configuration.logo.medium"
					imageClass="w-auto h-32 block mx-auto"
				/>

				<div v-if="$page.pages.length" class="col-span-5 my-6">
					<div class="mb-4">
						<p class="text-3xl text-center md:text-left">Esplora</p>
						<hr class="mt-5 border-gray-700" />
					</div>

					<div class="md:grid md:grid-cols-2 lg:grid-cols-4">
						<a
							v-for="page in $page.pages"
							:key="page.slug"
							:href="$route('page', page.slug)"
							class="capitalize md:inline md:text-left block text-center my-3"
						>
							{{ page.name }}
						</a>
					</div>
				</div>
			</div>

			<div class="text-center">
				<div
					class="my-5 py-5 mx-auto text-center text-black uppercase font-banner flex justify-center items-center gap-4"
				>
					<a
						href="https://www.instagram.com/siicomebill/"
						target="_blank"
						rel="noopener"
						class="block bg-primary h-16 w-16 rounded-full flex justify-center items-center"
					>
						<Icon :icon="['fab', 'instagram']" size="2x" />
					</a>

					<a
						href="https://www.facebook.com/siicomebill/"
						target="_blank"
						rel="noopener"
						class="block bg-primary h-16 w-16 rounded-full flex justify-center items-center"
					>
						<Icon :icon="['fab', 'facebook']" size="2x" />
					</a>

					<a
						href="https://www.github.com/siicomebill/"
						target="_blank"
						rel="noopener"
						class="block bg-primary h-16 w-16 rounded-full flex justify-center items-center"
					>
						<Icon :icon="['fab', 'github']" size="2x" />
					</a>
				</div>

				<p class="py-10">
					&copy; <strong>{{ $page.app.name }}</strong>
					{{ new Date().getFullYear() }}
				</p>

				<p>
					Made with
					<span class="font-handwritten text-primary text-4xl">LOVE</span> by
					<a href="https://mattia.codes/" rel="noopener" target="_blank"
						>Mattia Sinisi</a
					>
				</p>
			</div>
		</section>

		<!-- Privacy pop-up message -->
		<div
			class="bg-white text-black fixed bottom-0 right-0 m-5 rounded-lg flex items-center shadow-xl"
			v-if="!$page.auth && !closed"
		>
			<div class="py-2 px-4">
				<span class="text-lg font-banner block pb-1"
					>Possiamo sapere quali articoli leggi?</span
				>
				<span class="block"
					>Ci piace sapere quali contenuti apprezzi nel nostro sito, per questo
					utilizziamo servizi di <strong>analytics</strong> per sapere quali
					pagine del magazine visiti.</span
				>
			</div>

			<div class="flex items-center px-2 gap-2 font-banner">
				<span
					class="px-4 py-2 rounded-lg bg-green-500 text-white cursor-pointer"
					@click.prevent="closePopup"
					>SI</span
				>
				<span
					class="px-4 py-2 rounded-lg bg-red-700 text-white cursor-pointer"
					@click.prevent="disableAnalytics"
					>NO</span
				>
			</div>
		</div>
	</div>
</template>

<script>
import Dropdown from "~/Dropdown";
import { Reader } from "vue-publisher";

import { bootstrap } from "vue-gtag";

export default {
	components: {
		Dropdown,
		Reader,
		Thumbnail: () => import("~/Thumbnail"),
		UserDropdown: () => import("~/UserDropdown"),
	},
	props: {
		mode: {
			type: String,
			default: "sticky",
		},
	},
	mounted() {
		this.closed = this.$local.getItem("acceptedCookies") != undefined;
	},
	methods: {
		closePopup() {
			bootstrap().then(() => {
				this.closed = true;
				this.$ga.enable();
				this.$local.setItem("acceptedCookies", true);
			});
		},
		disableAnalytics() {
			this.$local.setItem("acceptedCookies", false);
			this.closed = true;
		},
	},
	data() {
		return {
			closed: false,
		};
	},
};
</script>