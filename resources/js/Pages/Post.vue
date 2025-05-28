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
    .md *{
        white-space: pre-wrap; /* Since CSS 2.1 */
    }
    ul{
        @apply list-disc pl-4 ;
    }

    ol{
        @apply list-decimal pl-4;
    }


    h2{
        @apply text-2xl font-bold;
    }

    h3{
        @apply text-2xl font-bold;
    }

    h4{
        @apply text-xl font-bold;
    }
    h1,h2{
        @apply mt-8 mb-4;
    }
    h3,h4{
        @apply mt-4 mb-2;
    }
    p{
        @apply mb-4;
    }
    img{
        @apply my-4;
        max-width: 100%;
        height: auto;
    }
    blockquote{
        @apply border-l-4 pl-4 italic text-gray-600 my-4;
    }
    pre{
        @apply bg-gray-100 p-4 rounded-md overflow-x-auto;
    }
    code{
        @apply bg-gray-200 p-1 rounded;
    }
}
</style>
