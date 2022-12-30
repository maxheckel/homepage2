<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "@/Layouts/UnauthedLayout.vue";
import ProjectCard from "@/Components/ProjectCard.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import SecondaryButton from "../Components/SecondaryButton.vue";

const props = defineProps({
    project: Object
})
</script>

<template>
    <Head :title="project.title"/>

    <UnauthedLayout>

        <div class="max-w-4xl mx-auto p-4 sm:px-6 lg:px-8">

            <div class="mt-8 flex">
                <img class="h-20 mr-4" :src="'/uploads/'+project.thumb_image_url">
                <div>
                    <h1 class="text-4xl block">{{ project.title }}</h1>
                    <sub class="italic">Published: {{project.published_at}} Updated: {{project.updated_at}}</sub>
                </div>

            </div>

            <div class="my-4">
                <a class="inline-block mr-4" v-if="project.live_url" target="_blank" :href="project.live_url"> <SecondaryButton >View Live Site</SecondaryButton></a>
                <a class="inline-block mr-4" v-if="project.github" target="_blank" :href="project.github"> <SecondaryButton >Github</SecondaryButton></a>
            </div>


            <div class="bg-gray-50 border-l-4 border border-gray-300 lg:w-1/2 p-4 italic">
                <b>At A Glace:</b>
                {{ project.short_content }}
            </div>

            <div class="content my-8" v-html="project.content"></div>
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
