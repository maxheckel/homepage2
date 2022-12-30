<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Hero from "@/Components/Hero.vue";
import InputLabel from "../Components/InputLabel.vue";
import TextInput from "../Components/TextInput.vue";
import InputError from "../Components/InputError.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);
const form = useForm({})
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <Hero class="hidden sm:block"/>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 s  m:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('home')" :active="route().current('home')">
                                    Home
                                </NavLink>
                                <NavLink :href="route('projects')" :active="route().current('projects')">
                                    Projects
                                </NavLink>
                                <NavLink :href="route('blog')" :active="route().current('blog')">
                                    Blog
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">

                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('home')" :active="route().current('home')">
                            Home
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('blog')" :active="route().current('blog')">
                            Projects
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('blog')" :active="route().current('blog')">
                            Blog
                        </ResponsiveNavLink>
                    </div>

                </div>
                <Hero class="block sm:hidden"/>

            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <footer class="bg-primary-900 text-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="md:grid grid-cols-3 gap-10">

                        <div class="text-left">
                            <h3 class="block font-bold text-xl mb-4">Contact</h3>
                            <p class="mb-4">
                            <b class="block">Phone</b> See resume
                            </p>
                            <p class="mb-10">
                            <b class="block">Email</b> heckel.max at gmail d0t com
                            </p>
                        </div>
                        <a class="text-center" target="_blank" href="/Max_Heckel_Resume.pdf">
                            <h3 class="block font-bold text-xl mb-4">Download my Resume</h3>

                            <span class="material-symbols-outlined text-8xl relative mx-auto block">
                            download
                            </span>
                            <div class="text-center">
                                Resume.pdf
                            </div>
                        </a>

                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>
