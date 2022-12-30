<template>
    <a :href="route('projects.show', project.id+'-'+project.slug)" class="w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-center">
            <img class="w-20 h-20 rounded-full border-2 border-gray-400" :src="'/uploads/'+project.thumb_image_url">
        </div>
        <div class="flex justify-center">
            <h2 class="row flex-row text-xl font-bold mb-4">{{project.title}}</h2>
        </div>
        <span>{{project.short_content}}</span>
        <sub class="mt-8 text-right block">Published: {{project.published_at}}</sub>
    </a>
</template>

<script setup>
const props = defineProps({
    project: Object
})
</script>

<style scoped>

</style>
