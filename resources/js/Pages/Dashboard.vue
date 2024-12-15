<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import ToggleSwitch from '@/Components/ToggleSwitch.vue';
import { router } from '@inertiajs/vue3'

defineProps({
    items: [Object, Array],
});

const updateStatus = (id, newValue) => {
    router.put(route('items.status-update', id), {
        status: newValue,
    });
};

const handleUpdate = (id) => {
    router.get(route('items.update', id));
}

const handleDelete = (id) => {
    router.delete(route('items.delete', id));
}
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

            <!-- Items Table -->
            <div class="container mx-auto p-4">
                <div class="">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md text-center">
                        <thead>
                            <tr class="bg-indigo-600 text-white">
                                <th class="py-2 px-4">Action</th>
                                <th class="py-2 px-4">No</th>
                                <th class="py-2 px-4">Item</th>
                                <th class="py-2 px-4">Category</th>
                                <th class="py-2 px-4">Description</th>
                                <th class="py-2 px-4">Price</th>
                                <th class="py-2 px-4">Owner</th>
                                <th class="py-2 px-4">Publish</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in items.data" class="border-b">
                                <td class="py-2 px-4 inline-flex gap-2 mt-1">
                                    <button @click="handleUpdate(item.id)" class="" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-5 h-5 fill-green-600 ml-1">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </button>
                                    <button @click="handleDelete(item.id)" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="w-5 h-5 fill-red-600 mr-1">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="py-2 px-4">{{ index + 1 }}</td>
                                <td class="py-2 px-4">{{ item.item_name }}</td>
                                <td class="py-2 px-4">{{ item.category }}</td>
                                <td class="py-2 px-4" v-html="item.description"></td>
                                <td class="py-2 px-4">{{ item.price }}</td>
                                <td class="py-2 px-4">{{ item.owner_name }}</td>
                                <td class="py-2 px-4">
                                    <ToggleSwitch v-model="item.status"
                                        @update:modelValue="(newValue) => updateStatus(item.id, newValue)" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="float-end mt-4">
                        <Pagination :links="items.links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
