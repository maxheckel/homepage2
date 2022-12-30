<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "@/Layouts/UnauthedLayout.vue";
import ProjectCard from "@/Components/ProjectCard.vue";

const props = defineProps({
    projects: Object
})
</script>

<template>
    <Head title="Projects"/>

    <UnauthedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:grid sm:grid-cols-2 md:grid-cols-3">
                    <ProjectCard v-for="project in projects.data" :project="project"></ProjectCard>
                </div>
            </div>
        </div>


    </UnauthedLayout>
</template>
