<template>
    <section>
        <div class="wrap">
            <div class="container">
                <div class="container-title">
                    {{ destinations.name }}
                </div>
                <div class="container-img">
                    <div class="img-preview">
                        <img v-for="image in images" :src="image.filename.includes('http')?image.filename:'http://127.0.0.1:8000/storage/destination_images/'+image.filename" alt="">
                    </div>
                </div>
                <div class="container-content">
                    <div class="content-head">
                        <p>{{ destinations.name }}</p>
                        <div class="content">
                            <div>
                                <fa-icon class="icon" icon="fa-solid fa-location-dot" />
                                {{ destinations.address }}
                            </div>
                            <div>
                                <fa-icon class="icon" icon="fa-solid fa-tags" />
                                TAG
                            </div>
                        </div>
                    </div>
                    <div class="content-description">
                        {{ destinations.description }}
                    </div>
                    <div class="content-location">
                        <h5>Kunjungi {{ destinations.name }} melalui Google Map</h5>
                        <iframe class="iframe" :src="destinations.location"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import api from '../../functions/api';

const route = useRoute()
const loading = ref(false)
const destinations = ref([])
const images = ref([])
const tags = ref([])

const getDestination = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/${route.params.id}`)
        destinations.value = response
    } finally {
        loading.value = false
    }
}
const getDestinationTag = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/tag`)
        tags.value = response.data
    } finally {
        loading.value = false
    }
}
const getDestinationImage = async () => {
    loading.value = true
    try {
        const response = await api.GET(`/api/destination/image/`)
        images.value = response.data.filter(img => img.destination_id == route.params.id)

    } finally {
        loading.value = false
    }
}

getDestination()
getDestinationImage()
getDestinationTag()
</script>

<style scoped>
section {
    display: inline-block;
}

.container {
    margin: 4.8rem auto;
}

.container-title {
    font-size: 3rem;
    text-align: center;
    margin: 2rem;
}

.container-img {
    width: 90%;
    height: 70vh;
    overflow: hidden;
    margin: 1rem auto;
    border-radius: .5rem;
}
.container-img > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.content-head {
    font-size: 1.5rem;
}

.content-head .content {
    display: flex;
    font-size: 1.1rem;
    gap: 1rem;
}

.content-description {
    margin-top: 1rem;
}

.content-location {
    margin-top: 2rem;
    font-size: 1.1rem;
    text-align: center;
}

.iframe {
    margin-top: .5rem;
    width: 100%;
}</style>