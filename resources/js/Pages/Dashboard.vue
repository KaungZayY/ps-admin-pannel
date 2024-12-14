<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <AppLayout title="Dashboard">
        <div class="w-full h-auto mt-4">
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold mb-8 text-indigo-700">Items List</h1>
                <div class="flex justify-end">
                    <Link :href="route('items.create')"
                        class="bg-indigo-700 text-white px-4 py-2 rounded-md hover:bg-indigo-900 transition duration-200 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="w-5 h-5 inline-block fill-white">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                    Add Items
                    </Link>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
