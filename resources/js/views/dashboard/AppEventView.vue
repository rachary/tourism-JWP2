<template>
    <div class="wrap">
        <div class="header">
            EVENT APP
        </div>
        <div class="wrapper">
            <event-view/>
        </div>
    </div>
</template>

<script setup>
import EventView from '../app/EventView.vue';
</script>

<style scoped>
.wrap {
    padding: 0;
}
.header {
    background: #FFB319;
    color: #F8F4EA;
    margin-bottom: .225rem;
    height: 10vh;
    display: flex;
    align-items: center;
    padding-left: 1rem;
    font-size: 2rem;
    pointer-events: none;
}
.wrapper {
    padding: 0 1rem;
    background: #F8F4EA;
    min-height: calc(100vh - 11vh);
    width: 100%;
    overflow-y: auto;
}
</style>