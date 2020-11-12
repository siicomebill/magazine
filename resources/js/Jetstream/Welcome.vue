<template>
	<div>
		<div
			class="bg-white border-b border-gray-200 grid grid-cols-5 gap-4 items-center"
		>
			<div>
				<Thumbnail :src="$page.user.profile_photo_url" alt="@" />
			</div>
			<div class="col-span-4 py-4">
				<div>
					<p class="text-2xl text-gray-900">
						Welcome, <span class="text-blue-500">{{ $page.user.name }}</span>.
					</p>
					<p class="text-gray-500">{{ $page.user.email }}</p>
				</div>

        <div class="my-5">
          <a href="/user/profile" class="button py-1 px-3 bg-blue-500 text-white rounded-lg shadow">Edit profile</a>
        </div>
			</div>
		</div>

		<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
			<div class="p-6" v-if="userIsWriter">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('articles.mine.list')">I tuoi articoli</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Visualizza e gestisci il tuo catalogo di articoli.
					</div>

					<a :href="$route('articles.mine.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Vai</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('config.list')">Configurazione</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Personalizza vari aspetti del sito.
					</div>

					<a :href="$route('config.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Personalizza</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('pages.list')">Pagine</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Crea pagine statiche per aggiungere contenuti fissi al sito.
					</div>

					<a :href="$route('pages.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Modifica</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('user.list')">Utenti</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Modifica i permessi o elimina utenti.
					</div>

					<a :href="$route('user.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Personalizza</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('sponsors.list')">Sponsors</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Stringi collaborazioni con degli sponsor e fai apparire il loro
						brand in mezzo agli articoli.
					</div>

					<a :href="$route('sponsors.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Sponsorizza</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('categories.list')">Categorie</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Organizza i tuoi articoli in categorie distinte.
					</div>

					<a :href="$route('categories.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Gestisci</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="p-6" v-if="userIsAdmin">
				<div class="flex items-center">
					<div class="text-lg text-gray-600 leading-7 font-semibold">
						<a :href="$route('component.list')">Componenti</a>
					</div>
				</div>

				<div>
					<div class="mt-2 text-sm text-gray-500">
						Aggiungi elementi alla lista di componenti integrabili nelle varie
						pagine del sito.
					</div>

					<a :href="$route('component.list')">
						<div
							class="mt-3 flex items-center text-sm font-semibold text-blue-500"
						>
							<div>Vai alla lista</div>

							<div class="ml-1 text-blue-500">
								<svg
									viewBox="0 0 20 20"
									fill="currentColor"
									class="arrow-right w-4 h-4"
								>
									<path
										fill-rule="evenodd"
										d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Thumbnail from "~/Thumbnail";

export default {
	components: {
		Thumbnail,
	},
	computed: {
		userIsAdmin() {
			return this.$page.user.roles.some((role) => role.name == "admin");
		},
		userIsWriter() {
			return this.$page.user.roles.some((role) => role.name == "writer");
		},
	},
};
</script>
