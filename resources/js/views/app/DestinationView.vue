<template>
    <section>
        <div class="wrap">
            <h1 class="headline">DESTINASI WISATA</h1>
            <div class="menu-cta">
                <div class="menu-search">
                    <input v-if="showSearch" v-focus type="text" v-model="searchName" placeholder="Tujuan anda ke..." />
                    <button class="search-btn" @click="showSearch = !showSearch">
                        <fa-icon icon="fa-solid fa-magnifying-glass" />
                        Destinasi
                    </button>
                </div>
                <select class="menu-select" v-model="selectedTag">
                    <option style="" value="">Semua Tag</option>
                    <option value="Museum">Museum</option>
                    <option value="Taman">Taman</option>
                    <option value="Kuliner">Kuliner</option>
                    <option value="Sport">Sport</option>
                </select>
            </div>
            <div class="content-destination">
                <div style="" v-for="destination in searchDestinations" :key="destination.name">
                    <DestinationLayout :destination="destination" />
                </div>
            </div>
        </div>

    </section>
</template>

<script setup>
import DestinationLayout from '../../layouts/app/DestinationLayout.vue';
import { computed, onUpdated, ref } from 'vue';

const searchName = ref('')
const selectedTag = ref('')
const showSearch = ref(false)


const destinations = ref([
    {
        tag: 'Museum',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648709900_1.jpg',
        name: 'Museum Pendidikan Surabaya',
        address: 'Jl. Genteng Kali No. 10'
    },
    {
        tag: 'Museum',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648710891_1.jpg',
        name: 'Museum Olahraga Surabaya',
        address: 'Jl. Indragiri No.6, Gelora Pancasila'
    },
    {
        tag: 'Museum',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652779387_1.jpg',
        name: 'Gedung Nasional Indonesia (GNI) & Museum Dr. Soetomo',
        address: 'JL Bubutan no 85 - 87'
    },
    {
        tag: 'Museum',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652779620_1.jpg',
        name: 'Museum Blockbuster',
        address: 'Jl. Raya Kenjeran 463-465'
    },
    {
        tag: 'Museum',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652777982_1.jpg',
        name: 'Monumen Kapal Selam',
        address: 'Jl. Pemuda no. 39'
    },
    {
        tag: 'Kuliner',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1653019735_1.jpg',
        name: 'G Walk Citraland',
        address: 'Ruko Taman Gapura Jl. Niaga Gapura'
    },
    {
        tag: 'Kuliner',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654139851_1.jpg',
        name: 'Sentra Ikan Bulak',
        address: 'Jl. Sukolilo 7 no.24, Surabaya'
    },
    {
        tag: 'Taman',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654137105_1.jpg',
        name: 'Taman Bungkul',
        address: 'Jl. Taman Bungkul, Darmo'
    },
    {
        tag: 'Taman',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1648713405_1.jpg',
        name: 'Kebun Binatang Surabaya',
        address: 'Jl. Setail No. 1, Darmo, Wonokromo'
    },
    {
        tag: 'Taman',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654136213_1.jpg',
        name: 'Taman Hiburan Pantai (THP) Kenjeran',
        address: 'Jl. Pantai Lama Kenjeran no. 1'
    },
    {
        tag: 'Sport',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844832_1.jpg',
        name: 'Stadion Gelora Bung Tomo (GBT)',
        address: 'Benowo, Pakal, Surabaya'
    },
    {
        tag: 'Sport',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844613_1.jpg',
        name: 'Lapangan Hockey - Softball',
        address: 'Jl. Lap. Dharmawangsa no. 56'
    },
    {
        tag: 'Sport',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1652844761_1.jpg',
        name: 'Gelora Pancasila',
        address: 'Jl. Indragiri no. 6'
    },
    {
        tag: 'Cagar Budaya',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1654761532_1.jpg',
        name: 'Gereja Katolik Kelahiran Santa Perawan Maria',
        address: 'Jl. Kepanjen 4-6'
    },
    {
        tag: 'Cagar Budaya',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1655198364_1.jpg',
        name: 'Jembatan Merah Arcade',
        address: 'Jl. Jembatan Merah 2'
    },
    {
        tag: 'Cagar Budaya',
        imageUrl: 'https://tourism.surabaya.go.id/storage/tour/1655194124_1.jpg',
        name: 'Makam Al Habib Muhammad Bin Idrus Al Habsyi',
        address: 'Jl. Ampel Gubah Lor'
    },
])

const searchDestinations = computed(() => {
    return destinations.value
        .filter(destination => selectedTag.value === '' || destination.tag === selectedTag.value)
        .filter(destination => destination.name.toLowerCase().includes(searchName.value.toLowerCase()))
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

    .responsive-div select option {
        width: min-content;
        display: inline-block;
        text-align: center;
        justify-content: center;
    }
}</style>