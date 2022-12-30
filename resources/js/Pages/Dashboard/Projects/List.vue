<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "../../../Components/Pagination.vue";
import { Link} from '@inertiajs/inertia-vue3';
const props = defineProps({
    projects: Object
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <PrimaryButton  class="inline-block" type="link"><a :href="route('dashboard.projects.new')">+ New Project</a></PrimaryButton>

                    <div class="my-4" v-for="project in projects.data">
                        <div class="grid grid-cols-4">
                            <div class="flex items-center">
                                <a :href="route('dashboard.projects.edit', project.id)">{{project.title}}</a>
                                <div class="inline-block ml-4 w-4 rounded-full h-4 bg-green-400" v-if="project.published_at != null"></div>
                                <div class="inline-block ml-4 w-4 rounded-full h-4 bg-red-400" v-if="project.published_at == null"></div>
                            </div>
                            <div>Created: {{project.created_at}}</div>
                            <div>Updated: {{project.updated_at}}</div>
                            <div>
                                Published: {{project.published_at}}
                            </div>
                        </div>

                    </div>
                    <Pagination :links="projects.links"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
