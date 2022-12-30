<template>
    <div class="md:grid grid-cols-[20%_80%] my-16">
        <div class="flex items-center justify-center">
            <img class="w-1/3 h-auto" :src="imagePath">
        </div>
        <div>
            <h4 class="font-bold text-lg">{{ title }}</h4>
            <p>{{description}}</p>
            <a v-if="url != null" :href="url" target="_blank"><SecondaryButton class="my-4">Check it out</SecondaryButton></a>
        </div>

    </div>
</template>

<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import SecondaryButton from "./SecondaryButton.vue";

const props = defineProps({
    imagePath: String,
    description: String,
    title: String,
    url: String
})
</script>

<style scoped>

</style>
