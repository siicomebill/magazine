<template>
	<div class="flex items-center">
		<div class="relative">
			<jet-dropdown align="right" width="48">
				<template #trigger>
					<button
						class="flex text-sm border-2 border-black border-2 p-1 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
					>
						<Thumbnail
							square
							class="w-8"
							imageClass="w-8 h-full rounded-full"
							:src="$page.user.profile_photo_url"
						/>
					</button>
				</template>

				<template #content>
					<!-- Account Management -->
					<div class="block px-4 py-2 font-banner uppercase">
						{{$page.user.name}}
					</div>

					<jet-dropdown-link href="/user/profile"> Gestisci profilo </jet-dropdown-link>

					<jet-dropdown-link href="/manage"> Vai alla tua bacheca </jet-dropdown-link>

					<jet-dropdown-link
						href="/user/api-tokens"
						v-if="$page.jetstream.hasApiFeatures"
					>
						API Tokens
					</jet-dropdown-link>

					<div class="border-t border-gray-100"></div>

					<!-- Team Management -->
					<template v-if="$page.jetstream.hasTeamFeatures">
						<div class="block px-4 py-2 text-xs text-gray-400">Manage Team</div>

						<!-- Team Settings -->
						<jet-dropdown-link :href="'/teams/' + $page.user.current_team.id">
							Impostiazioni dei Team
						</jet-dropdown-link>

						<jet-dropdown-link
							href="/teams/create"
							v-if="$page.jetstream.canCreateTeams"
						>
							Nuovo Team
						</jet-dropdown-link>

						<div class="border-t border-gray-100"></div>

						<!-- Team Switcher -->
						<div class="block px-4 py-2 text-xs text-gray-400">
							Cambia Team
						</div>

						<template v-for="team in $page.user.all_teams">
							<form @submit.prevent="switchToTeam(team)" :key="team.id">
								<jet-dropdown-link as="button">
									<div class="flex items-center">
										<svg
											v-if="team.id == $page.user.current_team_id"
											class="mr-2 h-5 w-5 text-green-400"
											fill="none"
											stroke-linecap="round"
											stroke-linejoin="round"
											stroke-width="2"
											stroke="currentColor"
											viewBox="0 0 24 24"
										>
											<path
												d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
											></path>
										</svg>
										<div>{{ team.name }}</div>
									</div>
								</jet-dropdown-link>
							</form>
						</template>

						<div class="border-t border-gray-100"></div>
					</template>

					<!-- Authentication -->
					<form @submit.prevent="logout">
						<jet-dropdown-link as="button"> <span class="text-red-500">Esci</span> </jet-dropdown-link>
					</form>
				</template>
			</jet-dropdown>
		</div>
	</div>
</template>

<script>
import JetDropdown from "Jet/Dropdown";
import JetDropdownLink from "Jet/DropdownLink";
import Thumbnail from "~/Thumbnail";

export default {
	components: {
		JetDropdown,
		JetDropdownLink,
		Thumbnail,
	},
	methods: {
		switchToTeam(team) {
			this.$inertia.put(
				"/current-team",
				{
					team_id: team.id,
				},
				{
					preserveState: false,
				}
			);
		},

		logout() {
			axios.post("/logout").then((response) => {
				window.location = "/";
			});
		},
	},
};
</script>