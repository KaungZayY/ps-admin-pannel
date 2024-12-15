<script setup>
import { ref, onMounted, watch } from 'vue';

const props = defineProps({
    modelValue: String,
});

const emit = defineEmits(['update:modelValue']);

const locationInput = ref(null);
const mapContainer = ref(null);
let map = null;
let marker = null;

const updateLocation = (lat, lng) => {
    const newValue = `${lat}, ${lng}`;
    locationInput.value.value = newValue;
    emit('update:modelValue', newValue);
};

const moveMarker = (lat, lng) => {
    if (marker) {
        marker.setLatLng([lat, lng]);
        map.setView([lat, lng], 13);
    }
};

watch(() => props.modelValue, (newValue) => {
    if (newValue) {
        const coords = newValue.split(',').map(parseFloat);
        if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
            moveMarker(coords[0], coords[1]);
        }
    }
});

onMounted(() => {
    map = L.map(mapContainer.value).setView([16.8661, 96.1951], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    marker = L.marker([16.8661, 96.1951], {
        draggable: true,
    }).addTo(map);

    marker.bindPopup('A sample marker on the map.').openPopup();

    marker.on('dragend', function () {
        const markerLatLng = marker.getLatLng();
        updateLocation(markerLatLng.lat, markerLatLng.lng);
    });

    if (props.modelValue) {
        const coords = props.modelValue.split(',').map(parseFloat);
        if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
            moveMarker(coords[0], coords[1]);
        }
    }
});
</script>

<template>
    <div class="mb-4 mt-2">
        <input ref="locationInput" type="text" id="locationInput"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            required :value="modelValue" readonly
            @input="updateLocation($event.target.value.split(',')[0], $event.target.value.split(',')[1])" />
    </div>

    <div ref="mapContainer" id="map" class="w-full h-[400px]"></div>
</template>
