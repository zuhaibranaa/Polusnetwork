<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm text-purple-50">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
