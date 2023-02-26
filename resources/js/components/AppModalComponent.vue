<template>
    <teleport to="body">
        <div v-if="isOpen" class="backdrop" @click.self="close">
            <div class="modal">
                <h2>{{ title }}</h2>
                <slot></slot>
            </div>
        </div>
    </teleport>
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

<style scoped>
.backdrop {
    position: absolute;
    background: transparent;
    z-index: 50;
    height: 100%;
    width: 100%;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal {
    text-align: center;
    background: #FD8A8A;
    padding: .5rem;
    box-shadow: 0 1rem 1rem .5rem rgba(0, 0, 0, .5);
    border-radius: .5rem;
}
h2 {
    margin-bottom: 1rem;
    text-transform: uppercase;
    color: white;
    font-size: 1.2rem;
}
</style>