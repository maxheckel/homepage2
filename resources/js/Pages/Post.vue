<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "@/Layouts/UnauthedLayout.vue";
import ProjectCard from "@/Components/ProjectCard.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import SecondaryButton from "../Components/SecondaryButton.vue";

const props = defineProps({
    post: Object
})
</script>

<template>
    <Head :title="post.title"/>

    <UnauthedLayout>

        <div class="max-w-4xl mx-auto p-4 sm:px-6 lg:px-8">

            <div class="mt-8 flex">
                <div>
                    <h1 class="text-4xl block">{{ post.title }}</h1>
                    <sub class="italic">Published: {{post.published_at}} Updated: {{post.updated_at}}</sub>
                </div>

            </div>

            <div class="content my-8" v-html="post.content"></div>
            <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
        </div>


    </UnauthedLayout>
</template>

<style lang="scss">

.content{
    @apply text-lg leading-loose;
    h1{
        @apply text-3xl;
    }
    h2{
        @apply text-2xl;
    }
    h3{
        @apply text-xl;
    }
    b{
        @apply font-bold;
    }
}
</style>
