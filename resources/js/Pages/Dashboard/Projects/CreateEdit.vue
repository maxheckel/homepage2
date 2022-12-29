<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import Editor from '@tinymce/tinymce-vue';


const props = defineProps({
    project: Object
})

const form = useForm({
    title: props.project?.title,
    github: props.project?.github,
    live: props.project?.live_url,
    content: props.project?.content,
    saveOnly: true,
    thumbnail: null,
    unpublish: false,

})


const submit = () => {

    if (props.project){
        form.post(route('dashboard.projects.edit', props.project.id))
    } else{
        form.post(route('dashboard.projects.store'))
    }

}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{props.project ? 'Edit Project' : 'New Project'}}
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
                            <InputLabel for="thumbnail" value="Thumbnail" />
                            <input type="file" @input="form.thumbnail = $event.target.files[0]" />
                            <InputError class="mt-2" :message="form.errors.live" />
                        </div>
                        <div class="mb-8">
                            <InputLabel for="content" value="Content" />
                            <Editor v-model="form.content" api-key="API_KEY" :init="{plugins: 'wordcount lists link image '}" />

                            <InputError class="mt-2" :message="form.errors.live" />
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <PrimaryButton @click="form.saveOnly = true" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save
                            </PrimaryButton>

                            <PrimaryButton v-if="!props.project || props.project?.published_at == null" @click="form.saveOnly = false" class="ml-4 bg-emerald-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Publish
                            </PrimaryButton>

                            <PrimaryButton v-if="props.project?.published_at != null" @click="form.unpublish = true" class="ml-4 bg-red-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Unpublish
                            </PrimaryButton>
                            <PrimaryButton v-if="props.project != null" @click="form.delete(route('dashboard.projects.destroy', project.id))" class="ml-4 bg-red-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Delete
                            </PrimaryButton>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
