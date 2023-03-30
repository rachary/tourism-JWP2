<template>
    <section>
        <div class="wrap">
            <h1 class="headline">DESTINASI WISATA</h1>
            <div class="menu-cta">
                <div class="menu-search">
                    <input v-if="showSearch" v-focus type="text" v-model="searchName" placeholder="Tujuan anda ke..." />
                    <button class="search-btn" @click="searchToggle">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Destinasi
                    </button>
                </div>
                <select class="menu-select" v-model="selectedRegion">
                    <option :value="null">Semua Region</option>
                    <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                </select>
                <select class="menu-select" v-model="selectedTag">
                    <option :value="null">Semua Tag</option>
                    <option v-for="tag in tags" :value="tag.name">{{ tag.name }}</option>
                </select>
            </div>
            <div class="content-destination">
                <div v-for="destination in filterSearch" :key="destination.id">
                    <destination-layout :destination="destination" />
                </div>
            </div>
        </div>

    </section>
</template>

<script setup>
import DestinationLayout from '../../layouts/app/DestinationLayout.vue';
import { computed, ref } from 'vue';
import api from '../../functions/api';

const searchName = ref('')
const selectedTag = ref(null)
const selectedRegion = ref(null)
const showSearch = ref(false)
const loading = ref(false)
const filterData = ref([])
const destinations = ref([])
const tags = ref([])
const regions = ref([])

const searchToggle = () => {
    showSearch.value = !showSearch.value
    if(!showSearch.value) {
        searchName.value = ''
    }
}

const getDestinations = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination')
        destinations.value = response.data
    } finally {
        loading.value = false
    }
}

const getDestinationRegions = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination/region')
        regions.value = response.data
    } finally {
        loading.value = false
    }
}

const getDestinationTags = async () => {
    loading.value = true
    try {
        const response = await api.GET('/api/destination/tag')
        tags.value = response.data
    } finally {
        loading.value = false
    }
}

const filterSearch = computed(() => {
    if (selectedTag.value || searchName.value || selectedRegion.value) {
        filterData.value = destinations.value.filter(destination => {
            let matchTag = true;
            let matchRegion = true;
            let matchName = true;
            if(selectedTag.value) {
                matchTag = destination.destination_tags.some(tag => tag.name === selectedTag.value)
            }
            if(selectedRegion.value) {
                matchRegion = destination.destination_region_id === selectedRegion.value
            }
            if(searchName.value) {
                matchName = destination.name.toLowerCase().includes(searchName.value.toLowerCase())
            }
            return matchTag && matchName && matchRegion
        })
        return filterData.value
    } else {
        return destinations.value
    }
})

getDestinations()
getDestinationRegions()
getDestinationTags()
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

.content-destination {
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

/* Responsive 480px */
@media screen and (max-width: 480px) {
    section {
        padding: 0 1rem;
    }
    .wrap {
        padding: 0rem;
    }
    .headline {
        margin-top: 5rem;
        font-size: 3rem;
    }
    .menu-cta {
        justify-content: center;
        flex-direction: column;
    }
    .menu-search {
        flex-direction: column-reverse;
        font-size: 1.2rem;
    }

    .menu-search input {
        width: 100%;
        padding: .5rem 1rem;
        border-radius: .5rem;
    }

    .search-btn {
        padding: .5rem 1rem;
        border-radius: .5rem;
    }
    .menu-select {
        padding: .5rem 1rem;
        font-size: 1.2rem;
    }
    .content-destination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 80vh;
        overflow: auto;
        padding: 0 1rem;
        border: 1px solid #888;
        border-radius: .5rem;
        background: #FFE7CC;
    }
}

/* Responsive 481px - 768px */
@media screen and (min-width: 481px) and (max-width: 768px) {
    section {
        padding: 0 1rem;
    }
    .wrap {
        padding: 0rem;
    }
    .headline {
        margin-top: 5rem;
        font-size: 3rem;
    }
    .menu-cta {
        justify-content: center;
        flex-direction: column;
    }
    .menu-search {
        flex-direction: column-reverse;
        font-size: 1.2rem;
    }

    .menu-search input {
        width: 100%;
        padding: .5rem 1rem;
        border-radius: .5rem;
    }

    .search-btn {
        padding: .5rem 1rem;
        border-radius: .5rem;
    }
    .menu-select {
        padding: .5rem 1rem;
        font-size: 1.2rem;
    }
    .content-destination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 80vh;
        overflow: auto;
        padding: 0 1rem;
        border: 1px solid #888;
        border-radius: .5rem;
        background: #FFE7CC;
    }
}

/* Responsive 769px - 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    section {
        padding: 0 1rem;
    }
    .wrap {
        padding: 0rem;
    }
    .headline {
        margin-top: 5rem;
        font-size: 3rem;
    }
    .menu-cta {
        justify-content: center;
        flex-direction: column;
    }
    .menu-search {
        flex-direction: column-reverse;
        font-size: 1.2rem;
    }

    .menu-search input {
        width: 100%;
        padding: .5rem 1rem;
        border-radius: .5rem;
    }

    .search-btn {
        padding: .5rem 1rem;
        border-radius: .5rem;
    }
    .menu-select {
        padding: .5rem 1rem;
        font-size: 1.2rem;
    }
    .content-destination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 80vh;
        overflow: auto;
        padding: 0 1rem;
        border: 1px solid #888;
        border-radius: .5rem;
        background: #FFE7CC;
    }
}
</style>