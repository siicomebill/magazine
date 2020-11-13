<template>
	<div>
		<nav
			class="top-0 left-0 right-0 z-30 lg:bg-white lg:text-black bg-black text-white shadow-lg lg:px-6 lg:py-1 px-4"
			:class="mode"
		>
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

				<Dropdown
					class="text-black lg:-mb-6 lg:shadow-xl rounded-lg"
					title="Rubriche"
					mobileOnly
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
										<span class="cursor-pointer block my-auto font-bold capitalize">{{
											category.name
										}}</span>
									</a>
									<div class="flex">
										<Dropdown
											class="text-black flex-grow my-auto"
											v-if="category.children.length"
										>
											<a
												class="text-sm block lg:flex-grow"
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

				<div class="lg:inline-block lg:order-last flex items-end">
					<div v-if="$page.auth">
						<UserDropdown />
					</div>

					<Dropdown v-else mobileOnly title="Account">
						<div class="lg:grid grid-cols-2 gap-2">
							<a
								:href="$route('login')"
								class="block text-sm text-center px-4 py-2 leading-none border rounded border-black text-black hover:bg-black hover:text-white hover:border-transparent lg:mt-0"
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

		<main>
			<slot></slot>
		</main>

		<section class="footer py-10 px-4 banner bg-black text-white">
			<div
				class="container mx-auto px-4 bg-black rounded-lg border-2 border-white"
			>
				<div v-if="$page.pages.length" class="my-6">
					<div class="mb-4">
						<p class="text-3xl text-center md:text-left">Esplora</p>
						<hr class="mt-5 border-gray-700" />
					</div>

					<div class="col-span-3 md:grid md:grid-cols-2 lg:grid-cols-4">
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

				<div class="my-5 py-5 mx-auto text-center">
					<a
						href="https://www.instagram.com/siicomebill/"
						target="_blank"
						rel="noopener"
						class="cta-royal mx-5"
						>Instagram</a
					>
					<a
						href="https://www.facebook.com/siicomebill/"
						target="_blank"
						rel="noopener"
						class="cta-blue mx-5"
						>Facebook</a
					>
				</div>

				<div class="w-1/2 mx-auto text-center pt-20">
					<p class="py-5" v-if="$page.configuration.footer">
						<Reader v-model="$page.configuration.footer" />
					</p>

					<Thumbnail
						v-if="$page.configuration.logo"
						:src="$page.configuration.logo.small"
						imageClass="w-auto h-auto block mx-auto logo-invert"
					/>

					<p class="py-10">
						&copy; <strong>{{ $page.app.name }}</strong>
						{{ new Date().getFullYear() }}
					</p>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
import Dropdown from "~/Dropdown";
import { Reader } from "vue-publisher";

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
};
</script>