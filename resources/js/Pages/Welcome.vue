<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import UnauthedLayout from "../Layouts/UnauthedLayout.vue";
import WorkExperience from "../Components/WorkExperience.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head title="Welcome"/>

    <UnauthedLayout>
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
                <a href="https://go.dev/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-go-plain"></i></a>
                <a href="https://php.net/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-php-plain"></i></a>
                <a href="https://laravel.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-laravel-plain"></i></a>
                <a href="https://vuejs.org/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-vuejs-plain"></i></a>

                <a href="https://angular.io/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-angularjs-plain"></i></a>
                <a href="https://www.typescriptlang.org/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-typescript-plain"></i></a>
                <a href="https://javascript.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-javascript-plain"></i></a>
                <a href="https://docker.io/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-docker-plain"></i></a>
                <div class="hidden md:block"></div>
                <a href="https://aws.amazon.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-amazonwebservices-original"></i></a>
                <a href="https://cloud.google.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-googlecloud-plain"></i></a>
                <a href="https://mysql.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-mysql-plain"></i></a>
                <a href="https://git-scm.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-git-plain"></i></a>
                <a href="https://circleci.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-circleci-plain"></i></a>
                <a href="https://symfony.com/" class="rounded-md text-center bg-primary-200 text-primary-800 p-4" target="_blank"><i class="devicon-symfony-original"></i></a>

            </div>
        </div>
        <div id="commento"></div>

        <div class="py-12 bg-gradient-to-t	from-primary-300 to-primary-100">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <h2 class="text-2xl font-bold">Work Experience</h2>
                    <WorkExperience
                        url="https://assistant.google.com/"
                        description="Building tools to make a/b testing and flag guarding on google assistant awesome. Authored policies for developers on how they change code in google assistant to allow them to do so in the safest, most effective way possible. Built analytics and tracking tools to measure effectiveness of google's experiments in assistant. Helped facilitate change in a system that affects a planet-scale amount of users."
                        image-path="/google.png" title="Google"/>
                    <WorkExperience
                        url="https://mheducation.com"
                        description="Oversaw the development of a new learning platform as the program engineering lead. Managed engineering teams concurrently with tens of engineers working across 3 teams. Planned, organized and executed on entirely new apps built from scratch with several integrations within and outside MHE's ecosystem. Primary technologies used by the teams were Go, Angular 7 & 10, CircleCI, Kubernetes, AWS and various other technologies."
                        image-path="/meh.png" title="McGraw Hill Education"/>
                    <WorkExperience
                        url="https://patronart.com"
                        description="Built a custom ecommerce/marketplace allowing users to buy art and commission work from artists around the world. Implemented escrow services for the artists so funds can be stored prior to the artist complete their commissions, insuring they get paid. Implemented a complex build process, minimizing scripts and page load time."
                        image-path="/patronart.png" title="PatronArt"/>
                    <WorkExperience
                        url="https://lookhuman.com"
                        description="Completely re-built and re-architected a custom built ecommerce platform. Built using Laravel, Symfony and Vue.js it servers tens of thousands of unique users a day. Set up an advanced infrastructure on AWS using ECS clusters and multiple EC2 instances. Built an extremely comprehensive backroom to allow for reporting, modification and monitoring of the multiple brands hosted on the platform."
                        image-path="/lookhuman.png" title="Print Syndicate"/>
                    <WorkExperience

                        description="A company I co-founded out of college with 2 partners. Raised just under half a million dollars in funding. Built an entire secure platform for investors to be verified by the companies they are investing in for 506(c) offerings."
                        image-path="/crowdentials.png" title="Crowdentials"/>
                </div>
            </div>
        </div>


    </UnauthedLayout>
</template>
