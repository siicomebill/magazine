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

				<Dropdown class="text-black" title="Esplora" mobileOnly>
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
										<span class="cursor-pointer block my-auto">{{
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

					<hr class="my-3 lg:hidden" />

					<div class="lg:inline-block">
						<div v-if="$page.auth">
							<a
								:href="$route('dashboard')"
								class="inline-block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent lg:mt-0"
								>Dashboard</a
							>
						</div>

						<div v-else class="grid grid-cols-2 text-center">
							<a
								:href="$route('login')"
								class="block text-sm px-4 py-2 leading-none border rounded border-black hover:bg-black hover:text-white hover:border-transparent lg:mt-0"
								>Login</a
							>
							<a
								:href="$route('register')"
								class="block text-sm px-4 py-2 leading-none lg:mt-0"
								>Registrati</a
							>
						</div>
					</div>
				</Dropdown>
			</div>
		</nav>

		<main>
			<slot></slot>
		</main>

		<section class="py-6 bg-gray-200 text-gray-700">
			<div class="container mx-auto px-4 md:px-0">
				<div class="py-5 mx-auto text-center">
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
						<Reader v-model="$page.configuration.footer"/>
					</p>

					<p class="py-10">
						&copy; <strong>{{ $page.app.name }}</strong> {{ new Date().getFullYear() }}
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
	},
	props: {
		mode: {
			type: String,
			default: "sticky",
		},
	},
};
</script>