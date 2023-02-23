<template>
    <side-layout/>
    
    <router-view class="content-layout"/>    
</template>

<script setup>
import SideLayout from './SideLayout.vue';
</script>

<style scoped>
.content-layout {
    margin-left: 14rem;
    min-height: 100vh;
    overflow-y: auto;
}
</style>