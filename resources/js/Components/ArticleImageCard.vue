<template>
    <ImageCard v-bind="$props" :href="$route('articles.read', identifier)"/>
</template>

<script>
import ImageCard from '~/ImageCard';
import ResourceWithSlug from '@/Mixins/ResourceWithSlug';

export default {
    mixins: [
        ResourceWithSlug,
    ],
    extends: ImageCard,
    components: {
        ImageCard,
    },
}
</script>