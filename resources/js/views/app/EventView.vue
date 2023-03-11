<template>
    <section>
        <div class="wrap">
            <h1 class="headline">EVENT SURABAYA</h1>
            <div class="menu-cta">
                <!-- <select class="menu-select" v-model="selectedRegion">
                    <option :value="null">Semua Region</option>
                    <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                </select>
                <select class="menu-select" v-model="selectedTag">
                    <option :value="null">Semua Tag</option>
                    <option v-for="tag in tags" :value="tag.name">{{ tag.name }}</option>
                </select> -->
            </div>
            <div class="content-event">
                <div v-for="event in events" :key="event.id">
                    <event-layout :event="event" />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import api from '../../functions/api';
import EventLayout from '../../layouts/app/EventLayout.vue'
const loading = ref(false)
const events = ref([])

const getEvent = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/event')
        events.value = response.data
    } finally {
        loading.value = false
    }
}
getEvent()
</script>

<style scoped>
section {
    display: inline-block;
    padding: 0 2.5rem;
}

.wrap {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.headline {
    margin-top: 4.375rem;
    font-size: 3.5rem;
    text-align: center;
}

.menu-cta {
    display: flex;
    justify-content: right;
    width: 100%;
    margin-top: 1rem;
    padding: .2rem 0;
    gap: .5rem;
}

.menu-search {
    display: flex;
}

.menu-search input {
    width: 45rem;
    background: #FFFFD2;
    padding: .225rem 1rem;
    color: #555;
    border-radius: .5rem 0 0 .5rem;
    display: inline-block;
}

.search-btn {
    background: #8AAAE4;
    padding: .225rem 1rem;
    color: white;
    border-radius: 0 .5rem .5rem 0;
}

.search-btn:focus,
.search-btn:hover {
    color: #FFFFD2;
}

.menu-select {
    background: #8AAAE4;
    padding: .225rem 1rem;
    color: white;
    border-radius: .5rem;
}

select option:hover {
    filter: brightness(150%);
}

.content-event {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    overflow: auto;
    padding: 0 30px;
    border: 1px solid #888;
    border-radius: 8px 0 0 8px;
    background: #FFE7CC;
}

</style>