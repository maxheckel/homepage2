<template>
    <div class="grid grid-cols-[20%_80%] my-16">
        <div class="flex items-center justify-center">
            <img class="w-1/3 h-auto" :src="imagePath">
        </div>
        <div>
            <h4 class="font-bold text-lg">{{ title }}</h4>
            {{description}}
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    imagePath: String,
    description: String,
    title: String
})
</script>

<style scoped>

</style>
