<template>
    <section>
        <div class="wrap">
            <h1 class="headline">EVENT SURABAYA</h1>
            <div class="menu-cta">
                <div class="menu-search">
                    <button class="search-btn" @click="showDateStart = !showDateStart">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Tanggal Mulai
                    </button>
                    <input v-if="showDateStart" class="date-input" type="date" v-model="searchDateStart">
                </div>

                <div class="menu-search">
                    <button class="search-btn" @click="showDateEnd = !showDateEnd">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Tanggal Selesai
                    </button>
                    <input v-if="showDateEnd" class="date-input" type="date" v-model="searchDateEnd">
                </div>
            </div>
            <div class="content-event">
                <div v-for="event in filteredEvents" :key="event.id">
                    <event-layout :event="event" />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import api from '../../functions/api';
import EventLayout from '../../layouts/app/EventLayout.vue'
const loading = ref(false)
const showDateStart = ref(false)
const showDateEnd = ref(false)
const events = ref([])
const searchDateStart = ref('')
const searchDateEnd = ref('')

const getEvent = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/event')
        events.value = response.data
    } finally {
        loading.value = false
    }
}

const filteredEvents = computed(() => {
    if (!searchDateStart.value || !searchDateEnd.value) {
        return events.value;
    }
    
    const dateStart = new Date(searchDateStart.value)
    const dateEnd = new Date(searchDateEnd.value)

    return events.value.filter((event) => {
        const eventDateStart = new Date(event.date_start)
        const eventDateEnd = new Date(event.date_end)

        return (
            eventDateStart >= dateStart && 
            eventDateEnd <= dateEnd
        )
    })
})

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
    justify-content: center;
    width: 100%;
    margin-top: 1rem;
    padding: .2rem 0;
    gap: .5rem;
}

.menu-search {
    display: flex;
    flex-direction: column;
}

.menu-search input {
    width: fit-content;
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
    border-radius: .5rem;
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