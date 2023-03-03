<template>
    <section>
        <div class="wrap">
            <h1 class="headline">EVENT SURABAYA</h1>
            <div class="menu-cta">
                <div class="menu-search">
                    <input v-if="showSearch" v-focus type="text" v-model="searchName" placeholder="Tujuan anda ke..." />
                    <button class="search-btn" @click="showSearch = !showSearch">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Nama Event
                    </button>
                </div>
            </div>
            <div class="menu-cta">
                <div class="menu-search">
                    <input v-if="showSearch" v-focus type="text" v-model="searchStartDate" placeholder="00-00-00" />
                    <button class="search-btn" @click="showSearch = !showSearch">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Mulai Event
                    </button>
                </div>
            </div>
            <div class="menu-cta">
                <div class="menu-search">
                    <input v-if="showSearch" v-focus type="text" v-model="searchEndDate" placeholder="00-00-00" />
                    <button class="search-btn" @click="showSearch = !showSearch">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Selesai Event
                    </button>
                </div>
            </div>
            <div class="content-event">
                <div style="" v-for="event in searchEvents" :key="event.name">
                    <EventLayout :event="event" />
                </div>
            </div>
        </div>

    </section>
</template>

<script setup>
import EventLayout from '../../layouts/app/EventLayout.vue';
import { computed, onUpdated, ref } from 'vue';

const searchName = ref('')
const searchStartDate = ref('')
const searchEndDate = ref('')
const selectedNam = ref('')
const showSearch = ref(false)


const event = ref([
    {
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648710891_1.jpg',
        name: 'Konser raisa',
        startdate: '28-05-2023',
        enddate: '30-05-2023'

    },
    {
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648710891_1.jpg',
        name: 'Konser afgan',
        startdate: '19-05-2023',
        enddate: '10-05-2023'

    },

])

const searchEvents = computed(() => {
    return event.value
        .filter(event => selectedNam.value === '' || event.name === selectedNam.value)
        .filter(event => event.name.toLowerCase().includes(searchName.value.toLowerCase()))
        .filter(event => event.startdate.toLowerCase().includes(searchStartDate.value.toLowerCase()))
        .filter(event => event.enddate.toLowerCase().includes(searchEndDate.value.toLowerCase()))
})

</script>

<style scoped>
section {
    display: inline-block;
    padding: 0 4rem;
}

.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 90%;
    margin: 0 auto;
}

.headline {
    margin-top: 4.375rem;
    font-size: 3.5rem;
}

.menu-cta {
    display: flex;
    justify-content: right;
    width: 100%;
    margin: 1rem;
    gap: 1rem;
    padding: .2rem 0;
}

.menu-search {
    display: flex;
}

.menu-search input {
    width: 25rem;
    background: #FFFFD2;
    padding: .225rem 1rem;
    color: #555;
    border-radius: .5rem 0 0 .5rem;
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
    background: #FFE7CC
}

@media screen and (max-width: 476px) {
    .responsive-div {
        flex-direction: column;
    }

    .responsive-button {
        flex-direction: column-reverse;
    }

    .responsive-button button {
        min-width: 100%;
        justify-content: center;
    }


}</style>