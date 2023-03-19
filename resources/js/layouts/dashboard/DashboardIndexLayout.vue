<template>
    <main>
        <side-layout/>
        <router-view class="content-layout"/>    
    </main>
</template>

<script setup>
import SideLayout from './SideLayout.vue';
import api from '../../functions/api';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const user = ref()
const router = useRouter()





</script>

<style scoped>

.content-layout {
    margin-left: 14rem;
    min-height: 100vh;
    overflow-y: auto;
}
</style>