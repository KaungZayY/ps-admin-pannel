<script setup>
defineProps({
    value: String,
    isRequired: {
        type: Boolean,
        default: false,
    },
    customClass: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <label :class="['block font-medium text-sm text-gray-700', customClass]">
        <span v-if="value">
            {{ value }}
            <span v-if="isRequired" class="text-red-500">*</span>
        </span>
        <span v-else>
            <slot />
        </span>
    </label>
</template>
