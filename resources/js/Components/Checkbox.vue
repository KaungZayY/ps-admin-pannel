<script setup>
import { ref } from 'vue';

defineProps({
    modelValue: [String, Number],
});

const emit = defineEmits(['update:modelValue']);

const checkbox = ref(null);

defineExpose({ focus: () => checkbox.value.focus() });

const updateValue = (checked) => {
    const value = checked ? 1 : 0;
    emit('update:modelValue', value);
};
</script>

<template>
    <input
        ref="checkbox"
        type="checkbox"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :checked="modelValue == 1"
        @change="updateValue($event.target.checked)"
    >
</template>
