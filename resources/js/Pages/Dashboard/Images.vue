<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "../../Components/Pagination.vue";
import {useForm} from "@inertiajs/inertia-vue3";
const props = defineProps({
    images: Object
})

const form = useForm({
    image: null
})

const submit = () => {
    form.post(route('dashboard.images.store'))
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Images
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <form @submit.prevent="submit">
                        <div class="mb-8 justify-end">

                            <input type="file" @input="form.image = $event.target.files[0]" />

                            <PrimaryButton @click="form.saveOnly = true" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </form>
                    <div class="grid grid-cols-4 gap-8">
                        <img class="w-full h-auto" :src="'/uploads/'+image.filename" v-for="image in images.data">
                    </div>
                    <Pagination :links="images.links"></Pagination>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
