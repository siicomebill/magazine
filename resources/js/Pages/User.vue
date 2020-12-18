<template>
    <div class="p-4">
        <div class="flex items-center text-white">
            <AuthorBadge v-bind="user" class="mx-auto"/>
        </div>

        <div>
            <ArticleCard
                v-for="article in user.articles"
                :key="article.id"
                v-bind="article"
            />
        </div>
    </div>
</template>

<script>
export default {
    components: {
        AuthorBadge: () => import("~/AuthorBadge"),
        ArticleCard: () => import("~/ArticleCard"),
    },
    props: {
        user: Object
    }
}
</script>