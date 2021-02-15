<template>
	<div class="flex gap-4">
		<a
			v-for="site in sites"
			:key="site.name"
			class="block w-16 h-16 rounded-full flex items-center justify-center text-white"
			:class="site.class"
            :href="site.url(link)"
            rel="nofollow"
            target="_blank"
		>
			<Icon :icon="['fab', site.icon]" size="2x"/>
		</a>
	</div>
</template>

<script>
export default {
	data() {
		return {
			sites: [
				{
					icon: "facebook",
					class: "bg-blue-500",
					url: (link) => {
						return `https://www.facebook.com/sharer/sharer.php?u=${link}`
					},
                },
                {
					icon: "twitter",
					class: "bg-blue-400",
					url: (link) => {
						return `https://twitter.com/share?&url=${link}&hashtags=siicomebillmagazine,siicomebill`
					},
                },
                {
					icon: "linkedin",
					class: "bg-blue-600",
					url: (link) => {
						return `https://www.linkedin.com/sharing/share-offsite/?url=${link}`
					},
				},
				{
					icon: "whatsapp",
					class: "bg-green-600",
					url: (link) => {
						return `whatsapp://send?text=Leggi questo articolo su Sii Come Bill Magazine: ${link}`
					},
				},
			],
		};
    },
    props: {
        link: {
            type: String,
            required: true,
        }
    }
};
</script>