<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import Editor from '@/Components/Editor.vue';
import SelectBox from '@/Components/SelectBox.vue';
import Checkbox from '@/Components/Checkbox.vue';
import LocationPicker from '@/Components/LocationPicker.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import countryCodesJson from '../../json/country_codes.json';

const form = useForm({
    item_name: '',
    category: '',
    price: '',
    description: '',
    item_condition: '',
    item_type: '',
    status: 0,
    item_photo: '',
    owner_name: '',
    country_code: '',
    phone_number: '',
    address: '',
});

const categories = [
    { value: 'clothes', label: 'Clothes' },
    { value: 'computers', label: 'Computers' },
    { value: 'mobiles', label: 'Mobiles' },
    { value: 'books', label: 'Books' },
];

const item_conditions = [
    { value: 'new', label: 'New' },
    { value: 'used', label: 'Used' },
    { value: 'good_second', label: 'Good Second Hand' },
];

const item_types = [
    { value: 'for_sell', label: 'For Sell' },
    { value: 'for_buy', label: 'For Buy' },
    { value: 'for_exchange', label: 'For Exchange' },
];

// console.log('Country Codes JSON:', countryCodesJson);

const countries = countryCodesJson.map((country) => ({
    value: country.dial_code,
    label: country.code,
}));

const submit = () => {
    form.post(route('items.create'));
};
</script>

<template>
    <AppLayout title="Create Item">
        <div class="w-full h-auto mt-8">
            <p class="bg-gray-400 px-2 rounded-md py-2 text-lg font-bold">Add Items</p>
            <form @submit.prevent="submit">
                <div class="flex flex-row justify-between mt-4 gap-4">
                    <div class="w-1/2 flex flex-col px-2">
                        <p class="font-bold mb-4">Item Information</p>

                        <!-- Item Name-->
                        <div class="mb-5">
                            <InputLabel for="item_name" value="Item Name" :isRequired="true" />
                            <TextInput id="item_name" v-model="form.item_name" type="text" class="mt-2 block w-full"
                                placeholder="Input Name" />
                            <InputError class="mt-2" :message="form.errors.item_name" />
                        </div>

                        <!-- Category-->
                        <div class="mb-5">
                            <InputLabel for="category" value="Select Category" :isRequired="true" />
                            <SelectBox id="category" :options="categories" v-model="form.category"
                                class="mt-2 block w-full" />
                            <InputError class="mt-2" :message="form.errors.category" />
                        </div>

                        <!-- Price-->
                        <div class="mb-5">
                            <InputLabel for="price" value="Price" :isRequired="true" />
                            <TextInput id="price" v-model="form.price" type="text" class="mt-2 block w-full"
                                placeholder="Enter Price" />
                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>

                        <!-- Description -->
                        <div class="mb-5">
                            <InputLabel value="Description" :isRequired="true" customClass="mb-2" />
                            <Editor id="description" v-model="form.description" />
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <!-- Item Condition -->
                        <div class="mb-5">
                            <InputLabel for="item_condition" value="Item Condition" :isRequired="true" />
                            <SelectBox id="item_condition" :options="item_conditions" v-model="form.item_condition"
                                class="mt-2 block w-full" />
                            <InputError class="mt-2" :message="form.errors.item_condition" />
                        </div>

                        <!-- Item Type -->
                        <div class="mb-5">
                            <InputLabel for="item_type" value="Item Type" :isRequired="true" />
                            <SelectBox id="item_type" :options="item_types" v-model="form.item_type"
                                class="mt-2 block w-full" />
                            <InputError class="mt-2" :message="form.errors.item_condition" />
                        </div>

                        <!-- Publish Status -->
                        <div class="mb-5">
                            <InputLabel for="status" value="Status" />
                            <Checkbox id="status" v-model="form.status" class="mt-2 inline-block w-5 h-5" />
                            <span class="text-gray-600 text-xs ml-3">Publish</span>
                            <InputError class="mt-2" :message="form.errors.status" />
                        </div>

                        <!-- Item Photo -->
                        <div class="mb-5">
                            <InputLabel for="item_photo" value="Item Photo" :isRequired="true" />
                            <input type="file" @input="form.item_photo = $event.target.files[0]" />
                            <InputError class="mt-2" :message="form.errors.item_photo" />
                        </div>
                    </div>
                    <div class="w-1/2 flex flex-col px-2">
                        <p class="font-bold mb-4">Owner Information</p>

                        <!-- Owner Name -->
                        <div class="mb-5">
                            <InputLabel for="owner_name" value="Owner Name" :isRequired="true" />
                            <TextInput id="owner_name" v-model="form.owner_name" type="text" class="mt-2 block w-full"
                                placeholder="Input Owner Name" />
                            <InputError class="mt-2" :message="form.errors.owner_name" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-5">
                            <InputLabel value="Phone Number" :isRequired="true" />
                            <div class="flex flex-row mt-2 justify-between">
                                <SelectBox :options="countries" v-model="form.country_code" class="w-1/6" />
                                <TextInput id="phone_number" type="text" v-model="form.phone_number" class="w-5/6" />
                            </div>
                            <InputError class="mt-2" :message="form.errors.country_code" />
                            <InputError class="mt-2" :message="form.errors.phone_number" />
                        </div>

                        <!-- Address-->
                        <div class="mb-5">
                            <InputLabel value="Address" :isRequired="true" />
                            <LocationPicker v-model="form.address" />
                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-row justify-end">
                            <Link :href="route('dashboard')"
                                class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Cancel
                            </Link>

                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
