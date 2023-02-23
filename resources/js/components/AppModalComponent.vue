<template>
    <div v-if="isOpen">
        <slot></slot>
    </div>
</template>

<script setup>
import { ref } from 'vue';

defineProps({
    title: {
        type: String,
        default: null,
    },
})

const isOpen = ref(false)

const open = () => {
    isOpen.value = true
}
const close = () => {
    isOpen.value = false
}

defineExpose({ open, close })
</script>