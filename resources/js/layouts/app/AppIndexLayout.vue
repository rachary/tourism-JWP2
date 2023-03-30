<template>
    <header-layout/>

    <router-view/>

    <footer-layout/>
</template>

<script setup>
import HeaderLayout from './HeaderLayout.vue';
import FooterLayout from './FooterLayout.vue';
</script>

<style scoped>

</style>