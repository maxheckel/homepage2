<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "../Layouts/UnauthedLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome"/>

    <UnauthedLayout title="Max Heckel - Columbus Ohio Web Engineer">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <h2 class="text-sm font-bold">About Me</h2>
                    <div class="md:grid grid-cols-2 gap-10 leading-7">
                        <div class="mb-8 md:mb-0">
                            <h3 class="text-3xl font-bold my-4">
                                My Work
                            </h3>
                            I've been a <b>full stack web developer</b> professionally for <b>more than a decade</b> now
                            but I've been coding since I was a kid. From <b>starting my own company</b>, working with
                            series A startups, enterprise software and <b>biG tech</b> I've worked in basically every
                            software development environment you could imagine.

                        </div>
                        <div>
                            <h3 class="text-3xl font-bold my-4">
                                My Tech
                            </h3>
                            When it comes to technology, <b>productivity</b> is what excites me the most. <b>I love
                            getting sh** done</b>. My favorite languages to do so are Go, PHP, Typescript, Javascript,
                            HTML, CSS, SQL, and Shell Script to name a few.

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full py-16 bg-white text-8xl px-4 bg-primary-100">
            <h3 class="text-4xl font-bold mb-8 text-center">Tech I've used in Prod</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8">
                <i class="rounded-md text-center bg-primary-200 text-primary-800 p-4 devicon-go-plain"></i>
                <i class="rounded-md text-center bg-primary-200 text-primary-700 p-4 devicon-php-plain"></i>
                <i class="rounded-md text-center bg-primary-300 text-primary-600 p-4 devicon-laravel-plain"></i>
                <i class="rounded-md text-center bg-primary-400 text-primary-800 p-4 devicon-vuejs-plain"></i>

                <i class="rounded-md text-center bg-primary-500 text-primary-100 p-4 devicon-angularjs-plain"></i>
                <i class="rounded-md text-center bg-primary-600 text-primary-300 p-4 devicon-typescript-plain"></i>
                <i class="rounded-md text-center bg-primary-700 text-primary-200 p-4 devicon-javascript-plain"></i>
                <i class="rounded-md text-center bg-primary-800 text-primary-100 p-4 devicon-docker-plain"></i>
                <div class="hidden md:block"></div>
                <i class="rounded-md text-center bg-primary-200 text-primary-800 p-4 devicon-amazonwebservices-original"></i>
                <i class="rounded-md text-center bg-primary-200 text-primary-700 p-4 devicon-googlecloud-plain"></i>
                <i class="rounded-md text-center bg-primary-300 text-primary-600 p-4 devicon-mysql-plain"></i>
                <i class="rounded-md text-center bg-primary-400 text-primary-800 p-4 devicon-git-plain"></i>
                <i class="rounded-md text-center bg-primary-500 text-primary-100 p-4 devicon-circleci-plain"></i>
                <i class="rounded-md text-center bg-primary-500 text-primary-800 p-4 devicon-symfony-original"></i>

            </div>
        </div>

        <div class="py-12 bg-green-700">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <h2 class="text-2xl font-bold">Projects / Work Experience</h2>
                </div>
            </div>
        </div>

    </UnauthedLayout>
</template>
