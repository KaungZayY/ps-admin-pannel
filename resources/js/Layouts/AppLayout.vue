<script setup>
import { reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const state = reactive({
    isSidebarOpen: true,
});

const toggleSidebar = () => {
    state.isSidebarOpen = !state.isSidebarOpen;
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>

        <Head :title="title" />

        <Banner />
        <div class="flex bg-gray-50 min-h-screen">
            <!-- Sidebar -->
            <div :class="state.isSidebarOpen ? 'w-64' : 'w-20'"
                class="fixed top-0 left-0 h-full bg-gray-400 p-6 flex flex-col transition-all duration-300 ease-in-out">
                <div class="flex items-center justify-start mb-8">
                    <img src="../Components/logo.png" alt="logo" class="w-9 h-9">
                    <h2 v-show="state.isSidebarOpen" class="text-2xl font-semibold ml-4">Admin Panel</h2>
                </div>
                <div class="flex flex-col h-full">
                    <!-- Links Section -->
                    <div class="flex-grow space-y-4">
                        <!-- Items Link -->
                        <div>
                            <a href="#" :class="[
                                state.isSidebarOpen ? 'bg-indigo-700 text-white' : 'text-gray-700',
                                'flex items-center p-2 rounded-md hover:bg-indigo-900 transition duration-200'
                            ]">
                                <svg v-show="state.isSidebarOpen" xmlns="http://www.w3.org/2000/svg"
                                    class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <rect width="7" height="7" x="5" y="5" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <rect width="7" height="7" x="15" y="5" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <rect width="7" height="7" x="5" y="15" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <rect width="7" height="7" x="15" y="15" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span v-show="state.isSidebarOpen" class="text-lg font-medium">Items</span>
                            </a>
                        </div>

                    </div>

                    <!-- Logout Button -->
                    <div class="mt-auto">
                        <form @submit.prevent="logout">
                            <button
                                class="flex items-center p-2 rounded-md hover:bg-gray-600 transition duration-200 w-full">
                                <svg v-show="state.isSidebarOpen" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" class="h-6 w-6 mr-2">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                                <span v-show="state.isSidebarOpen" class="text-lg font-medium">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Main Content -->
            <div :class="state.isSidebarOpen ? 'ml-64' : 'ml-20'"
                class="flex-1 p-8 bg-gray-100 transition-all duration-300 ease-in-out">
                <div class="border-b border-gray-500">
                    <button @click="toggleSidebar" class="text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
