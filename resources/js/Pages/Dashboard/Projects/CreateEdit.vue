<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import Editor from '@tinymce/tinymce-vue';

const form = useForm({
    title: "",
    github: "",
    live: "",
    content: ""

})

function submit(){

}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <form @submit.prevent="submit">
                        <div class="mb-8">
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="email"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div class="mb-8">
                            <InputLabel for="github" value="Github URL" />
                            <TextInput
                                id="github"
                                v-model="form.github"
                                type="url"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.github" />
                        </div>
                        <div class="mb-8">
                            <InputLabel for="live" value="Live URL" />
                            <TextInput
                                id="github"
                                v-model="form.live"
                                type="url"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.live" />
                        </div>
                        <div class="mb-8">
                            <InputLabel for="content" value="Content" />
                            <Editor v-model="form.content" api-key="API_KEY" :init="{plugins: 'wordcount lists link image '}" />

                            <InputError class="mt-2" :message="form.errors.live" />
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </AppLayout>
</template>