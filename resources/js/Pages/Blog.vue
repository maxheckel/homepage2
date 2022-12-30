<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "../Layouts/UnauthedLayout.vue";
import SecondaryButton from "../Components/SecondaryButton.vue";

const props = defineProps({
    posts: Object
})

</script>

<template>
    <Head title="Blog"/>

    <UnauthedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="post in posts.data" class="w-full flex my-8 items-center bg-white p-4 rounded-lg shadow-sm">
                    <div>
                        <h2 class="text-xl"> {{post.title}}</h2>
                        <sub class="block mt-1 italic text-gray-400 mb-4">Published: {{post.published_at}}</sub>
                        {{post.short_content}}
                    </div>


                    <div class="ml-auto">
                        <a :href="route('blog.show', post.id+'-'+post.slug)"> <SecondaryButton>View</SecondaryButton></a>
                    </div>
                </div>
            </div>
        </div>


    </UnauthedLayout>
</template>
