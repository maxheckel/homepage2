<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import UnauthedLayout from "../Layouts/UnauthedLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <UnauthedLayout title="Max Heckel - Columbus Ohio Web Engineer">


    </UnauthedLayout>
</template>
