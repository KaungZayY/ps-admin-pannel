<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    item_name: '',
    category: '',
    price: '',
    description: '',
    item_condition: '',
    item_type: '',
    status: '',
    item_photo: '',
    owner_name: '',
    phone_number: '',
    address: '',
});
</script>

<template>
    <AppLayout title="Create Item">
        <div class="w-full h-auto mt-8">
            <p class="bg-gray-400 px-2 rounded-md py-2 text-lg font-bold">Add Items</p>
            <form>
                <div class="flex flex-row justify-between mt-4 gap-4">
                    <div class="w-1/2 flex flex-col px-2">
                        <p class="font-bold mb-4">Item Information</p>

                        <!-- Item Name-->
                        <div class="mb-5">
                            <InputLabel for="item_name" value="Item Name" :isRequired="true"/>
                            <TextInput id="item_name" v-model="form.item_name" type="text" class="mt-2 block w-full"/>
                            <InputError class="mt-2" :message="form.errors.item_name" />
                        </div>

                        <!-- Category-->
                        <div class="mb-5">
                            <InputLabel for="category" value="Select Category" :isRequired="true"/>
                            <select v-model="form.category" class="mt-2 block w-full rounded-md">
                                <option value=""></option>
                                <option value="clothes">Clothes</option>
                                <option value="computers">Computers</option>
                                <option value="mobiles">Mobiles</option>
                                <option value="books">Books</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.item_name" />
                        </div>

                        <!-- Price-->
                        <div class="mb-5">
                            <InputLabel for="price" value="Price" :isRequired="true"/>
                            <TextInput id="price" v-model="form.price" type="text" class="mt-2 block w-full"/>
                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>

                        
                    </div>
                    <div class="w-1/2 flex flex-col px-2">
                        <p class="font-bold mb-4">Owner Information</p>
                        
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
